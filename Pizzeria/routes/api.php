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
    Route::post('login', 'Api\AuthController@login')->name('login');
    Route::post('logout', 'Api\AuthController@logout')->name('logout');
    Route::post('refresh', 'Api\AuthController@refresh')->name('refresh');
    return $request->user();
});
