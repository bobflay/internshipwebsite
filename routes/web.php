<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\PortfolioController;

use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/app',function(){
    return view('app');
});
Route::get('/android',function(){
    return redirect('https://play.google.com/store/apps/details?id=com.xpertbotacademy.exams');
});

Route::get('/ios',function(){
    return redirect('https://apps.apple.com/kh/app/xpertbot/id6450605037');
});

Route::get('/',[HomeController::class,'index']);

Route::get('/certificates/{id}',[CandidateController::class,'certificate']);

Route::get('/candidates/{id}',[CandidateController::class,'show']);

Route::get('/portfolios/{id}',[PortfolioController::class,'show']);

Route::get('/terms',function(){
    return view('terms_app');
});
Route::get('/support',function(){
    return view('support');
});
Route::get('/privacy',function(){
    return view('userprivacy');
});

Route::get('/students/{id}', [StudentController::class, 'show']);
Route::get('/students',[StudentController::class,'index']);

Route::get('phase2',[StudentController::class,'secondPhase']);

Route::get('/test',function(){


    $users = User::all();
    $result = [];
    foreach ($users as $key => $user) {
        $obj = [];
        $obj['name'] = $user->name;
        $answers = $user->answers;
        $obj['questions'] = count($answers);
        $obj['scholarship'] = is_null($user->candidate) ? '': $user->candidate->scholarship;
        $obj['category'] = is_null($user->candidate) ? '': $user->candidate->category->name;
        $obj['program'] = is_null($user->candidate) ? '': $user->candidate->program;
        $obj['discord_id'] = is_null($user->candidate) ? '': $user->candidate->discord_id;

        $score = 0;
        if(!empty($answers))
        {
            foreach ($answers as $key => $answer) {
                if($answer->isCorrect())
                {
                    $score = $score + 1;
                }
            }
        }
        $obj['score'] = (int)$score*100/50;
        if($obj['questions']>0)
        {
            array_push($result,$obj);
        }
    }

    usort($result, function ($a, $b) {
        return $b['score'] - $a['score'];
    });

    return response()->json($result);

});
