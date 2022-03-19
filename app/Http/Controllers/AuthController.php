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

        if(!auth()->user()->nickname){
            auth()->user()->nickname = 'Anonymous';
        }

        return response(['user' => auth()->user(), 'access_token' => $accessToken]);
    }

    public function register(Request $request){

        $credentials = Validator::make($request->all(), [
            'nickname' => ['nullable', 'string', 'min:4', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        if ($credentials->fails()){
            return response()->json(['errors' => $credentials->messages()], Response::HTTP_BAD_REQUEST);
        }

        try {
            $user = User::create([
                'nickname' => $request->nickname ?? null,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        } catch (\Illuminate\Database\QueryException $exception) {

            $errMsg = $exception->getMessage();
            $errCode = $exception->getCode();
            $nicknameErr = str_contains($errMsg, 'users_nickname_unique');
            $emailErr = str_contains($errMsg, 'users_email_unique');

            if($nicknameErr && $errCode === '23000'){
                return response(['error' => 'This nickname is already taken. Please choose another.']);
            } else if ($emailErr && $errCode === '23000'){
                return response(['error' => 'This email address is already in use. Please choose another.']);
            } else {
                return response(['error' => $exception->errorInfo]);
            }
        }

        if(!$user->nickname){
            $user->nickname = 'Anonymous';
        }

        Auth::login($user);

        $accessToken  = $user->createToken('gameAccessToken')->accessToken;

        return response(['user' => $user, 'access_token' => $accessToken]);
    }
}
