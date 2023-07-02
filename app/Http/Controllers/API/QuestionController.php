<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Models\Candidate;
use App\Models\Answer;
use App\Models\Category;
use App\Models\Question;
use Log;

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
        $category = $candidate->category;

        if(true)
        {
            $questions = Question::where('category_id',$category->id)->whereDoesntHave('answers',function($query) use ($user){
                    $query->where('user_id',$user->id);
            })->take(50)->get();

            $shuffled_questions = [];
    
            foreach ($questions as $question) {
                $choices = $question->choices->toArray();
                shuffle($choices);
                $question = $question->toArray();
                $question['choices'] = $choices;
                array_push($shuffled_questions,$question);
            }

            shuffle($shuffled_questions);

            return response()->json([
                'data' => [],
                'message' => 'Successfully retrieved questions.',
            ]);

        }

        

    }

    public function answer(Request $request)
    {
        $user = auth()->user();
        Log::info("Answer is submitted by ".$user->name);

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
