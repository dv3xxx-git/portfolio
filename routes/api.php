<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'api',

], function ($router) {

    Route::group([
        'prefix' => 'posts'
    ], function ($router) {
        Route::get('/destroy/{id}', 'App\Http\Controllers\PostController@delete');
        Route::get('/', 'App\Http\Controllers\PostController@index');
        Route::get('/{id}', 'App\Http\Controllers\PostController@find');
        Route::post('/', 'App\Http\Controllers\PostController@create');
        Route::post('/{id}', 'App\Http\Controllers\PostController@edit');
    });
});
