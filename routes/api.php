<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProductController;
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

Route::resource('products', ProductController::class)
    ->only(['index', 'show']);
    
Route::resource('products', ProductController::class)
    ->only(['store', 'update', 'destroy'])
    ->middleware('auth:sanctum');

Route::prefix('auth')->group(function(){
    Route::post('login', [ LoginController::class, 'login' ]);
    Route::post('logout', [ LoginController::class, 'logout' ]);
    Route::post('register', [ RegisterController::class, 'register' ]);
});
