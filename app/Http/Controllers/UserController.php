<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update(Request $request, Int $id){

    }

    public function deleteThrows(Int $id){

    }

    public function getUsers(){

        $users = User::all();
        perUserPercentage($users);

        return $users;
    }


}
