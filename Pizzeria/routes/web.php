<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin'], function () {
    Route::get('/pizzas/dodaj-skladnik/{id}', 'PizzasController@dodajSkladnik');
    Route::get('/pizzas/usun-skladnik/{id}', 'PizzasController@usunSkladnik');
    Route::resource('products', ProductsController::class);
    Route::resource('pizzas', PizzasController::class);
});
Route::get('/', 'PizzasController@list');
Route::get('/pizzas/{id}', 'PizzasController@show');
Route::get('/orders/create', 'OrdersController@create');

