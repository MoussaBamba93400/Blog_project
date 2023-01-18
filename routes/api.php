<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;





 Route::post('/v1/user/register', [AuthController::class, 'register']);
 Route::post('/v1/user/auth/login', [AuthController::class,'login']);

Route::get('/v1/users', [AuthController::class, 'index']);
Route::get('/v1/user/{id}', [AuthController::class, 'getUser']);

Route::put('v1/user/{id}', [AuthController::class, 'modify']);


Route::post('v1/article', [ArticleController::class, 'create']);
Route::get('v1/articles', [ArticleController::class, 'index']);

Route::get('v1/article/{id}', [ArticleController::class, 'getArticle']);
Route::put('v1/article/{id}', [ArticleController::class, 'modify']);
Route::delete('v1/article/{id}', [ArticleController::class, 'delete']);


// make sure to pass into the request body the id of the user who comment
Route::post('v1/article/{id}/comment', [CommentController::class, 'create']);
Route::get('v1/article/{id}/comments', [CommentController::class, 'index']);

Route::delete('v1/comment/{id}', [CommentController::class, 'delete']);

Route::put('v1/comment/{id}', [CommentController::class, 'modify']);
Route::put('v1/comment/{id}/activate', [CommentController::class, 'activate']);
Route::put('v1/comment/{id}/desactivate', [CommentController::class, 'desactivate']);


