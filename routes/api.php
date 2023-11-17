<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CustomAuthController;
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
