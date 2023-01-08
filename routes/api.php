<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    // Route::get('logout', [AuthController::class, 'logout']);
    // return Auth::user() ?? 'user not found';
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function () {
        return Auth::user() ?? 'User is not authenticated';
    });
    Route::get('logout', [AuthController::class, 'logout']);
});
