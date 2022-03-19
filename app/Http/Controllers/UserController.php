<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update(Request $request, Int $id){

    }

    public function deleteThrows(Int $id){

        if(!isSameUser($id)) return response(['message' => 'Unauthorized']);

        $result = Game::where('player_id', $id)->delete();

        if($result === 0){
            return response(['message' => 'There are no throws to be deleted']);
        }

        $result = 'Deleted ' . $result . (($result > 1) ? ' throws' : ' throw');

        return response(['message' => $result]);
    }

    public function getUsers(){

        $users = User::all();
        perUserPercentage($users);

        return $users;
    }


}
