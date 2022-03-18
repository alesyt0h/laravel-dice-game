<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request){

        $credentials = Validator::make($request->all(), [
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if ($credentials->fails()){
            return response()->json(['errors' => $credentials->messages()], Response::HTTP_BAD_REQUEST);
        }

        if(!Auth::attempt($credentials->validated())){
            return response([
                'message' => 'Invalid user or password'
            ], 401);
        }

        $accessToken = auth()->user()->createToken('gameAccessToken')->accessToken;

        return response(['user' => auth()->user(), 'access_token' => $accessToken]);
    }

    public function register(Request $request){

        $credentials = Validator::make($request->all(), [
            'nickname' => ['string', 'min:4','max:15'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        if ($credentials->fails()){
            return response()->json(['errors' => $credentials->messages()], Response::HTTP_BAD_REQUEST);
        }

        // TODO Make Validation Rule
        $match = User::select('nickname')->where('nickname', $request->nickname)->get();

        if(count($match)){
            return response(['message' => 'This nickname is already taken. Please choose another.']);
        }
        //

        if(! ($request->nickname ?? '')){
            $request->nickname = 'Anonymous';
        }

        $user = User::create([
            'nickname' => $request->nickname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $accessToken  = $user->createToken('gameAccessToken')->accessToken;

        return response(['user' => $user, 'access_token' => $accessToken]);
    }
}
