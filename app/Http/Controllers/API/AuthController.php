<?php
namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Candidate;
use App\Models\Category;
use App\Models\Batch;
use Log;


class AuthController extends Controller
{
    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');
        $batch = Batch::where('name','Summer 2023')->first();

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            //check if user belongs to Bach 2 and doesn't submit a receipt forward to the next page
            if($user->batches()->first()->id == $batch->id)
            {
                //check if the user uploaded a receipt
                if( $user->candidate->registered == 1 )
                {
                    $accessToken = $user->createToken('authToken')->plainTextToken;
                    return response()->json(['access_token' => $accessToken], 200);
                }else{

                    return response()->json(['error' => 'Unauthorized'], 401);
                }
            }

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
                $user->blocked = false;
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
        Log::info($request->all());

        $batch = Batch::where('name','Summer 2023')->first();

        $new_user = new User();
        $user = User::where('email',$request->email)->first();

        if($user)
        {
            if($user->receipts->count()>0)
            {
                return response()->json([
                    'message'=>'User already registered!'
                ],401);

            }else{

                $accessToken = $user->createToken('authToken')->plainTextToken;

                return response()->json([
                    'message'=>'User Registered Successfully',
                    'accessToken'=>$accessToken
                ]);
            }



        }else{
            if($request->password != $request->password_confirm)
            {
                return response()->json([
                    'message' => 'Password and confrim password are not identical'
                ],401);
            }

            $new_user->email = $request->email;
            $new_user->password = bcrypt($request->password);
            $new_user->name = $request->name;
            $new_user->save();
            $category = Category::where('name',$request->category)->first();

            $new_user->batches()->attach($batch,["category_id"=>$category->id,"passed"=>0,"registered"=>0,"scholarship"=>0]);


            $accessToken = $new_user->createToken('authToken')->plainTextToken;

            $candidate = new Candidate();
            $candidate->email = $new_user->email;
            $candidate->name = $new_user->name;
            $candidate->password = bcrypt($request->password);
            $candidate->phone = $request->phone;
            $candidate->category()->associate($category);
            $candidate->save();


            return response()->json([
                'message'=>'User Registered Successfully',
                'accessToken'=>$accessToken
            ]);

        }

    }

}
