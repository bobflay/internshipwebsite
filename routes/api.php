<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\API\QuestionController;
use App\Http\Controllers\API\ScreenCaptureController;

use App\Http\Controllers\API\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post("/registerNew",[AuthController::class,'registerNew']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/candidates/discord',[CandidateController::class,'updateDiscord']);
Route::get('/candidates/csv',[CandidateController::class,'exportCSV']);
Route::apiResource('candidates', CandidateController::class);


Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::post('refresh', [AuthController::class, 'refresh']);

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::get('questions',[QuestionController::class,'index']);
    Route::post('answer',[QuestionController::class,'answer']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('user', [AuthController::class, 'user']);
    Route::post('block', [AuthController::class, 'block']);
    Route::post('capture',[ScreenCaptureController::class,'store']);



});
