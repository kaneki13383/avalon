<?php

use App\Http\Controllers\CustomAuthController;
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
