<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

// POST /v1/auth/login
// POST /v1/auth/refresh
// GET /v1/auth/me
// POST/v1/auth/logout

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $token = Auth::guard('api')->attempt($credentials);

        if (!$token) {
            return response(['message' => "Unauthorized access!"], 401);
        }

        return response()->json([
            'access_token' => $token,
            'expires_in' => config('jwt.ttl') * 60
        ]);
    }

    public function refresh(){
         $refreshedToken = JWTAuth::parseToken()->refresh();
       
        return response()->json([
            'access_token' => $refreshedToken,
            'expires_in' => config('jwt.ttl') * 60 
        ]);
    }

    public function me()
    {
        $user = auth('api')->user();
        return response()->json($user);
    }

    public function logout(){
      Auth::guard('api')->logout();
      return response()->json(['messeage'=>'loggued out successfully!']);
    }
}
