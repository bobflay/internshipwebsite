<?php
namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Candidate;
use App\Models\Category;

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

    public function registerNew(Request $request)
    {
        $new_user = new User();
        $user = User::where('email',$request->email)->first();
        if($user)
        {
            return response()->json([
                'message'=>'User already registered!'
            ]);

        }else{
            if($request->password != $request->confirm_password)
            {
                return response()->json([
                    'message' => 'Password and confrim password are not identical'
                ]);
            }
            $new_user->email = $request->email;
            $new_user->password = bcrypt($request->password);
            $new_user->name = $request->name;
            $new_user->save();

            $candidate = new Candidate();
            $candidate->email = $new_user->email;
            $candidate->name = $new_user->name;
            $candidate->password = bcrypt($request->password);
            $candidate->phone = $request->phone;
            $category = Category::where('name',$request->category)->first();
            $candidate->category()->associate($category);
            $candidate->save();


            return response()->json([
                'message'=>'User Registered Successfully',
                'user'=>$user,
                'candidate'=>$candidate
            ]);

        }

    }
}
