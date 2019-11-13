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

Route::view('/', 'index');
Route::get('pagina/{id}', 'PageController@show');

Route::get('activiteit/', 'ActivityController@index');
Route::get('activiteit/{id}', 'ActivityController@show');

Route::get('actie/', 'ActionController@index');
Route::get('actie/{id}', 'ActionController@show');

Route::prefix('admin')->group(function () {
    Route::view('/', 'admin.index');

    Route::prefix('pagina')->group(function () {
        Route::get('/', 'PageController@admin');
        Route::post('new', 'PageController@create');
        Route::get('new', 'PageController@new');
        Route::patch('{id}', 'PageController@update');
        Route::get('{id}', 'PageController@edit');
    });

    Route::prefix('activiteit')->group(function () {
        Route::get('/', 'ActivityController@admin');
        Route::post('new', 'ActivityController@create');
        Route::get('new', 'ActivityController@new');
        Route::patch('{id}', 'ActivityController@update');
        Route::get('{id}', 'ActivityController@edit');
    });

    Route::prefix('actie')->group(function () {
        Route::get('/', 'ActionController@admin');
        Route::post('new', 'ActionController@create');
        Route::get('new', 'ActionController@new');
        Route::patch('{id}', 'ActionController@update');
        Route::get('{id}', 'ActionController@edit');
    });
});
