<?php
namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        $accessToken = $user->createToken('authToken')->plainTextToken;
        return response()->json(['access_token' => $accessToken], 200);
    } else {
        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
}
