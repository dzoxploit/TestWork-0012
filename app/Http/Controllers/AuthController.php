<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request, User $user)
    {
        return $user->saveUser($request)
            ->generateAndSaveApiAuthToken();
    }

    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::guard('web')->attempt($credentials)) {
            $user = Auth::guard('web')
                        ->user()
                        ->generateAndSaveApiAuthToken();

            return $user;
        }

        return response()->json(['message' => 'Error.....'], 401);
    }

    public function indexcuy(){
        return response()->json(['message' => 'Berhasil'], 201);
    }
    
    public function logout(Request $request)
    {
        $user = Auth::guard('api')->user();

        if ($user) {
            $user->api_token = null;
            $user->save();
        }

        return response()->json(['Success' => 'Logged out'], 200);
    }
}
