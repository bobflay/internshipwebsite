<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\API\QuestionController;
use App\Http\Controllers\API\ScreenCaptureController;
use App\Http\Controllers\API\ReceiptController;
use App\Http\Controllers\API\DashboardController;
use App\Http\Controllers\API\ParametersController;
use App\Http\Controllers\API\DevicesController;
use App\Http\Controllers\API\NotificationsController;
use App\Http\Controllers\API\TaskController;
use App\Http\Controllers\API\JobsController;
use App\Http\Controllers\API\BalanceController;
use App\Http\Controllers\API\TransactionController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\WalletController;

use App\Models\Category;
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
Route::get('/candidates/csv2',[CandidateController::class,'exportCSVall']);
Route::apiResource('candidates', CandidateController::class);

Route::get('/categories',function(){
    return response()->json(Category::all()->toArray());
});


Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::post('refresh', [AuthController::class, 'refresh']);

Route::get('parameters',[ParametersController::class,'index']);

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::post('/user/update-password', [UserController::class, 'updatePassword']);

    Route::apiResource('wallet', WalletController::class);
    Route::apiResource('transactions', TransactionController::class);

    Route::apiResource('balance', BalanceController::class);
    Route::post('device',[DevicesController::class,'store']);
    Route::get('notifications',[NotificationsController::class,'index']);
    Route::post('notifications/done',[NotificationsController::class,'done']);
    Route::get('questions',[QuestionController::class,'index']);
    Route::post('answer',[QuestionController::class,'answer']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('user', [AuthController::class, 'user']);
    Route::post('block', [AuthController::class, 'block']);
    Route::post('capture',[ScreenCaptureController::class,'store']);
    Route::post('receipt',[ReceiptController::class,'store']);
    Route::get('jobs',[JobsController::class,'index']);
    Route::post('jobs/{id}/apply',[JobsController::class,'apply']);

    Route::get('dashboard',[DashboardController::class,'index']);
    Route::get('/tasks/{id}',[TaskController::class,'show']);
    Route::put('/notifications/{id}',[NotificationsController::class,'update']);


});
