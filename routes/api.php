<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OutputBalanceController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\VkladController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [CustomAuthController::class, 'register']);
Route::get('/logout', [CustomAuthController::class, 'logout']);
Route::post('/login', [CustomAuthController::class, 'login']);
Route::get('/getme', [CustomAuthController::class, 'getme']);

Route::post('/create/vklad', [VkladController::class, 'create']);
Route::get('/my/vklad', [VkladController::class, 'my_vklad']);
Route::get('/my/vklad/summ', [VkladController::class, 'summ_active_deposit']);
Route::post('/return_profit', [VkladController::class, 'end_vklad']);

Route::get('/all_users', [CustomAuthController::class, 'get_all']);
Route::delete('/delete/{id}', [CustomAuthController::class, 'delete_user']);

Route::post('/application/create', [ApplicationController::class, 'create']);
Route::get('/application/all', [ApplicationController::class, 'get']);
Route::post('/application/accept', [ApplicationController::class, 'accept']);

Route::get('/application/get', [ApplicationController::class, 'get_user_application']);
Route::get('/application/summ', [ApplicationController::class, 'summ_plus']);
Route::post('/output/balance', [OutputBalanceController::class, 'create']);

Route::get('/balance/wait', [OutputBalanceController::class, 'get_user_outputbalance']);
Route::get('/balance/summ', [OutputBalanceController::class, 'summ_minus']);
Route::get('/balance/all', [OutputBalanceController::class, 'all']);
Route::post('/balance/accept', [OutputBalanceController::class, 'accept']);

Route::post('/create/news', [NewsController::class, 'create']);
Route::get('/news/all', [NewsController::class, 'all']);
Route::delete('/news/delete/{id}', [NewsController::class, 'delete']);

Route::get('/reviews/all', [ReviewsController::class, 'all']);
Route::delete('/reviews/delete/{id}', [ReviewsController::class, 'delete']);
Route::post('/reviews/create', [ReviewsController::class, 'create']);
