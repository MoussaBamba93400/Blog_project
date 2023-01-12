<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;




 Route::post('/v1/user/register', [AuthController::class, 'register']);
 Route::post('/v1/user/auth/login', [AuthController::class,'login']);

Route::get('/v1/users', [AuthController::class, 'index']);
Route::get('/v1/user/{id}', [AuthController::class, 'getUser']);

Route::put('v1/user/{id}', [AuthController::class, 'modify']);


Route::post('v1/article', [ArticleController::class, 'create']);
Route::get('v1/articles', [ArticleController::class, 'index']);

Route::get('v1/article/{id}', [ArticleController::class, 'getArticle']);
Route::put('v1/article/{id}', [ArticleController::class, 'modify'])
