<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    protected string $forbiddenMsg = 'You are not authorized to perform this action';

    public function update(Request $request, Int $id){

        if(!isSameUser($id) && !isAdmin()) return response()->json(['message' => $this->forbiddenMsg], 403);

        $credentials = Validator::make($request->all(), [
            'nickname' => ['nullable', 'string', 'min:4','max:15']
        ]);

        if ($credentials->fails()){
            return response()->json([
                'error' => $credentials->messages()
            ], 400);
        }

        if($request->nickname === auth()->user()->nickname){
            return response()->json(['message' => 'You already have that nickname'], 409);
        }

        $user = User::find($id);

        try {
            $user->update([
                'nickname' => (!trim($request->nickname)) ? null : trim($request->nickname)
            ]);
        } catch (\Illuminate\Database\QueryException $exception) {

            $errMsg = $exception->getMessage();
            $errCode = $exception->getCode();
            $nicknameErr = str_contains($errMsg, 'nickname');

            if($nicknameErr && $errCode === '23000'){
                return response()->json(['error' => 'This nickname is already taken. Please choose another.'], 409);
            } else {
                return response()->json(['error' => $exception->errorInfo], 409);
            }
        }

        anonymousSetter($user);

        return response()->json(['user' => $user, 'message' => 'Updated the nickname correctly']);
    }

    public function deleteThrows(Int $id){

        if(!isSameUser($id) && !isAdmin()) return response()->json(['message' => $this->forbiddenMsg], 403);

        $result = Game::where('player_id', $id)->delete();

        if($result === 0){
            return response()->json(['message' => 'There are no throws to be deleted'], 409);
        }

        $result = 'Deleted ' . $result . (($result > 1) ? ' throws' : ' throw');

        return response()->json(['message' => $result]);
    }

    public function getUsers(){

        if(!isAdmin()) return response()->json(['message' => $this->forbiddenMsg], 403);

        $users = User::all();

        $users = anonymousSetter($users, false);
        $users = perUserPercentage($users);

        return response()->json(['users' => $users]);
    }


}
