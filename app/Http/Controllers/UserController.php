<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function update(Request $request, Int $id){

        if(!isSameUser($id) && !isAdmin()) return response(['message' => 'Unauthorized']);

        $credentials = Validator::make($request->all(), [
            'nickname' => ['string', 'min:4','max:15']
        ]);

        if ($credentials->fails()){
            return response()->json(['error' => $credentials->messages()], Response::HTTP_BAD_REQUEST);
        }

        $user = User::find($id);

        try {
            $user->update([
                'nickname' => $request->nickname
            ]);
        } catch (\Illuminate\Database\QueryException $exception) {

            $errMsg = $exception->getMessage();
            $errCode = $exception->getCode();
            $nicknameErr = str_contains($errMsg, 'users_nickname_unique');

            if($nicknameErr && $errCode === '23000'){
                return response(['error' => 'This nickname is already taken. Please choose another.']);
            } else {
                return response(['error' => $exception->errorInfo]);
            }
        }

        return response(['user' => $user, 'message' => 'Updated the nickname correctly']);
    }

    public function deleteThrows(Int $id){

        if(!isSameUser($id) && !isAdmin()) return response(['message' => 'Unauthorized']);

        $result = Game::where('player_id', $id)->delete();

        if($result === 0){
            return response(['message' => 'There are no throws to be deleted']);
        }

        $result = 'Deleted ' . $result . (($result > 1) ? ' throws' : ' throw');

        return response(['message' => $result]);
    }

    public function getUsers(){

        if(!isAdmin()) return response(['message' => 'Unauthorized']);

        $users = User::all();

        $users = anonymousSetter($users, false);
        $users = perUserPercentage($users);

        return $users;
    }


}
