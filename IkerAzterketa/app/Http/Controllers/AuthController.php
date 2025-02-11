<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request) {
        // https://laravel.com/docs/11.x/validation
        $fields = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'teacher' => 'required|boolean'
        ]);

        $user = User::create($fields);

        $token = $user->createToken($request->name);

        return [
            'user' => $user,
            'token' => $token->plainTextToken
        ];
    }

    public function login(Request $request) {

        $fields = $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response(['message' => 'The provided credentials are incorrect.'],  401);

            //return [
            //    'message' => 'The provided credentials are incorrect.'
            //];
        } 

        $token = $user->createToken($user->name);

        return [
            'user' => $user,
            'token' => $token->plainTextToken
        ];

    }

    public function logout(Request $request) {
        $user = $request->user();
    
        if (!$user) {
            return response()->json(['error' => 'User not authenticated'], 401);
        }

        $user->tokens->each(function ($token) {
            $token->delete();
        });
    
        return response()->json(['message' => 'You are logged out.']);
    }    

    public function ikasleak(){
        $logged = Auth::user();
        if ($logged->teacher === 1){
            $ikasleak = User::where('teacher', 0)->get();
            return response()->json([
                'message' => 'ikasleen zerrenda',
                'ikasleak' => $ikasleak
            ]);
        } 
        return response()->json(['message' => 'Etzara irakaslea']);
    }

}
