<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
            return response()->json(['errors' => $credentials->messages()], 400);
        }

        if(!Auth::attempt($credentials->validated())){
            return response()->json([
                'message' => 'Invalid user or password'
            ], 401);
        }

        if(auth()->user()->is_admin){
            $accessToken = auth()->user()->createToken('adminToken', ['administrate'])->accessToken;
        } else {
            $accessToken = auth()->user()->createToken('userToken')->accessToken;
        }

        if(!auth()->user()->nickname){
            auth()->user()->nickname = 'Anonymous';
        }

        return response()->json(['user' => auth()->user(), 'access_token' => $accessToken]);
    }

    public function register(Request $request){

        $credentials = Validator::make($request->all(), [
            'nickname' => ['nullable', 'string', 'min:4', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        if ($credentials->fails()){
            return response()->json(['errors' => $credentials->messages()], 400);
        }

        try {
            $user = User::create([
                'nickname' => trim($request->nickname) ?? null,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        } catch (\Illuminate\Database\QueryException $exception) {

            $errMsg = $exception->getMessage();
            $errCode = $exception->getCode();
            $nicknameErr = str_contains($errMsg, 'users_nickname_unique');
            $emailErr = str_contains($errMsg, 'users_email_unique');

            if($nicknameErr && $errCode === '23000'){
                return response()->json(['error' => 'This nickname is already taken. Please choose another.'], 409);
            } else if ($emailErr && $errCode === '23000'){
                return response()->json(['error' => 'This email address is already in use. Please choose another.'], 409);
            } else {
                return response()->json(['error' => $exception->errorInfo], 409);
            }
        }

        $user = anonymousSetter($user);

        Auth::login($user);

        $accessToken  = $user->createToken('gameAccessToken')->accessToken;

        return response()->json(['user' => $user, 'access_token' => $accessToken]);
    }

    public function logout(){
        $user = Auth::user()->token();
        $user->revoke();

        return response()->json(['message' => 'You have been logged out']);
    }

}
