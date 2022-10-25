<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
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

Route::group(['prefix' => 'auth'], function() {
    Route::post('signin', [AuthController::class, 'signin']);
    Route::post('signup', RegisterController::class);
    Route::delete('signout', [AuthController::class, 'signout'])->middleware('auth:api');
});

Route::group(['middleware' => 'auth:api', 'prefix' => 'user'], function() {
    Route::get('userlist', [UserController::class, 'index']);
    Route::get('{user}', [UserController::class, 'show']);
});


Route::fallback(function () {
        return response()->json(['message' => 'Url requested doesn\'t exists.'], \Symfony\Component\HttpFoundation\Response::HTTP_NOT_FOUND);
});
