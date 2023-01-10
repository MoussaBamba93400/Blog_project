<?php

use Illuminate\Http\Request;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;

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


Route::get('/v1/users', [UserController::class, 'index']);
Route::get('/v1/user/:id', [UserController::class, 'index']);

Route::post('/v1/user/register', [UserController::class, 'index']);
Route::post('/v1/user/auth/login', [UserController::class, 'index']);









Route::get('/articles', [ArticleController::class, 'index']);
