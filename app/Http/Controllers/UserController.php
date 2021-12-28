<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use JWTAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserController extends Controller
{
    //function for login
    public function login(Request $request)
    {
        //get the credentials
        $credentials = $request->only('email', 'password');

        //try if there's invalid credentials
        try{
            if(!$token = JWTAuth::attempt($credentials)){
                return response()->json(['error' => 'Invalid credentials'], 400);
            }
        }catch(JWTException $e){
            return response()->json(['error' => 'Could not create token'], 500);
        }

        $user = Auth::user();

        //return the token
        return response()->json([
            'email' => $user->email,
            'token' => $token,
            'username' => $user->username,
        ], 200);
    }

    //function for register
    public function register(Request $request)
    {
        //validate the request
        $validator = Validator::make($request->all(), [
            'email' => "required|string|email|max:255|unique:users",
            'encrpyted_password' => 'required|string|min:6',
            'username' => 'required|string',
            'phone' => 'required',
            'name' => 'required|string',
            'postcode' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
        ]);

        //if fails then return the error response
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }


        //create user if validated
        $user = User::create([
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'name' => $request->get('name'),
            'password' => Hash::make($request->get('encrpyted_password')),
            'phone' => $request->get('phone'),
            'address' => $request->get('address'),
            'city' => $request->get('city'),
            'country' => $request->get('country'),
            'postcode' => $request->get('postcode'),
        ]);

        //get the token
        $token = JWTAuth::fromUser($user);

        //return the user data and token as response
        return response()->json([
            'email' => $user->email,
            'token' => $token,
            'username' => $user->username,
        ], 201);
    }

    //function for logout
    public function logout(Request $request)
    {
        //validate the token
        $validator = Validator::make($request->only('token'), [
            'token' => 'required'
        ]);

        //if fails then return the error response
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //try the invalidate user using token
        try {
            JWTAuth::invalidate($request->token);

            return response()->json([
                'success' => true,
                'message' => 'User has been logged out'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, user cannot be logged out'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getUsers()
    {
        $users = User::All();

        return response()->json(['users' => $users], 200);
    }
}
