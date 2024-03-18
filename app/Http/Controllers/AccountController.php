<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;

class AccountController extends Controller
{
    public function delete(Request $request)
    {
        $phone_number = $request->get('phone');
        $candidate = Candidate::where('phone',$phone_number)->get()->first();
        if(!is_null($candidate))
        {
            // $candidate->delete();
            return response()->json([
                'code'=>200,
                'message'=>'Candidate deleted successfully'
            ]);
        }else{
            return response()->json([
                'code'=>400,
                'message'=>'Candidate not found'
            ]);
        }

    }
}
