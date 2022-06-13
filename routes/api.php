<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ResponseController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/


Route::get('/', function () {
    return "Api";
});
Route::get('/users',[UserController::class, 'show']);
Route::post('/users',[UserController::class, 'createUser']);
Route::get('/users/{id}',[UserController::class, 'getUserById']);
Route::put('/users/{id}',[UserController::class, 'updateUser']);
Route::delete('/users/{id}',[UserController::class, 'deleteUser']);
Route::get('/users/post/{id}',[UserController::class, 'getUserWithPost']);

Route::get('/posts',[PostController::class, 'getAllPosts']);
Route::post('/posts',[PostController::class, 'createPost']);
Route::get('/posts/{id}',[PostController::class, 'getPostById']);
Route::put('/posts/{id}',[PostController::class, 'updatePost']);
Route::delete('/posts/{id}',[PostController::class, 'deletePost']);
Route::get('/posts/user/{id}',[PostController::class, 'getPostWithUser']);


Route::get('/responses',[ResponseController::class,'getAllResponses']);
Route::post('/responses',[ResponseController::class,'createResponse']);
Route::get('/responses/{id}',[ResponseController::class,'getResponseById']);
Route::put('/responses/{id}',[ResponseController::class,'updateResponse']);
Route::delete('/responses/{id}',[ResponseController::class,'deleteResponse']);
