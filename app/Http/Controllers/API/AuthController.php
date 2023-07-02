<?php
namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Log;
class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if(!$user->blocked)
            {
                $accessToken = $user->createToken('authToken')->plainTextToken;
                return response()->json(['access_token' => $accessToken], 200);
            }else{
                return response()->json(['status' => "User is blocked"], 402);
            }
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    public function block(Request $request)
    {
        $user = auth()->user();
        Log::info($user->name." is blocked!");
        if($user->email != 'test@test.com')
        {
            if($user)
            {
                $user->blocked = true;
                $user->save();
                return response()->json([
                    'status'=>'success'
                ],200);
            }
        }else{
            return response()->json([
                'status'=>'success'
            ],200);
        }

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
