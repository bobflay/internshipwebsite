<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Models\Candidate;

class QuestionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }
    public function index(Request $request)
    {
        $user = auth()->user();
        $candidate = Candidate::where('email',$user->email)->first();
        $questions = $candidate->category->questions()
        ->with(['choices' => function ($query) {
            $query->select('id', 'content','question_id');
        }])->get();

        return response()->json([
            'data' => $questions,
            'message' => 'Successfully retrieved questions.',
        ]);

        
    }
}
