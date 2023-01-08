<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $requestData = $request->all();
        $user = User::create($requestData);
        $user->assignRole('User');
        return response()->json([
            'success' => true,
            'status' => 200,
            'data' => $user,
            'message' => 'User successfully registered'
        ]);
    }

    public function login(LoginRequest $request)
    {
        $requestData = $request->all();
        $remember_me  = !empty($request->remember_me) ? TRUE : FALSE;
        // create our user data for the authentication
        $fieldType = filter_var($requestData['username'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $userdata = array(
            $fieldType => $requestData['username'],
            'password' => $requestData['password'],
        );
        if (Auth::attempt($userdata, $remember_me)) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;
            return response()->json([
                'success' => true,
                'status' => 200,
                'data' => $user,
                'access_token' => $token,
                'message' => 'You are successfully logged in'
            ]);
        }
        return response()->json([
            'success' => false,
            'status' => 500,
            'message' => 'User is not found'
        ]);
    }

    public function logout()
    {
        $user = Auth::user();
        if ($user) {
            session()->flush();
            $user->tokens()->delete();
            Auth::logout();
            return response()->json([
                'success' => true,
                'status' => 200,
                'message' => 'User is successfully logged out'
            ]);
        }
        return response()->json([
            'success' => false,
            'status' => 500,
            'message' => 'User is not logged in yet or not found'
        ]);
    }
}
