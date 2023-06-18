<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Models\Candidate;
use App\Models\Answer;


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
        }])->take(5)->get();

        return response()->json([
            'data' => $questions,
            'message' => 'Successfully retrieved questions.',
        ]);
    }

    public function answer(Request $request)
    {
        $user = auth()->user();

        $data = $request->validate([
            'question_id' => 'required|integer',
            'choice_id' => 'required|integer',
        ]);

        // Create a new answer
        $answer = Answer::create([
            'question_id' => $data['question_id'],
            'choice_id' => $data['choice_id'],
            'user_id'=>$user->id
        ]);

        // Return a response with the created answer
        return response()->json([
            'message' => 'Answer submitted successfully',
            'answer' => $answer,
        ]);
    }
}
