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



Route::group(['namespace' => '\App\Http\Controllers'], function() {

    Route::prefix('/episodes')->group(function(){

        Route::get('/{id}', 'EpisodeController@get')->where(['id'=> '[0-9]+']);
    
        Route::get('/', 'EpisodeController@index')->name('get_episodes');
    
    });

    Route::prefix('/characters')->group(function(){

        Route::get('/random', 'CharacterController@random');
    
        Route::get('/', 'CharacterController@index');
    
    });

    Route::prefix('/quotes')->group(function(){

        Route::get('/random', 'QuoteController@random');
    
        Route::get('/', 'QuoteController@index');
    
    });
    
});