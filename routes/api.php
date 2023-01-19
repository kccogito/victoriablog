<?php

namespace App\Http\Controllers;

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

Route::resource('article', 'App\Http\Controllers\Api\ArticleController', ['except' => ['create', 'edit']]);
Route::resource('tag', 'App\Http\Controllers\Api\TagController', ['except' => ['create', 'edit']]);
Route::resource('comment', 'App\Http\Controllers\Api\CommentController', ['except' => ['create', 'edit']]);
Route::post('articles/{id}/view', 'App\Http\Controllers\Api\ArticleController@views');
Route::post('articles/{id}/like', 'App\Http\Controllers\Api\ArticleController@likes');
Route::post('articles/{id}/comment', 'App\Http\Controllers\Api\CommentController@single_article');
