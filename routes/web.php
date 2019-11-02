<?php

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

Route::get('/', function () {
    return view('index');
});
Route::get('pagina/{id}', 'PageController@show');

Route::prefix('admin')->group(function () {
    Route::get('pagina', 'PageController@index');
    Route::post('pagina/new', 'PageController@create');
    Route::get('pagina/new', 'PageController@new');
    Route::patch('pagina/{id}', 'PageController@update');
    Route::get('pagina/{id}', 'PageController@edit');
});
