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

Route::get('/', 'DashboardController@index');
Route::get('pagina/{id}', 'PageController@show');

Route::get('activiteit/', 'ActivityController@index');
Route::get('activiteit/{id}', 'ActivityController@show');

Route::get('actie/', 'ActionController@index');
Route::get('actie/{id}', 'ActionController@show');

Route::get('uitdaging/', 'ChallengeController@index');
Route::get('uitdaging/{id}', 'ChallengeController@show');

Route::prefix('admin')->group(function () {
    Route::view('/', 'admin.index');

    Route::prefix('pagina')->group(function () {
        Route::get('/', 'PageController@admin');
        Route::post('new', 'PageController@create');
        Route::get('new', 'PageController@new');
        Route::delete('{id}', 'PageController@destroy');
        Route::patch('{id}', 'PageController@update');
        Route::get('{id}', 'PageController@edit');
    });

    Route::prefix('activiteit')->group(function () {
        Route::get('/', 'ActivityController@admin');
        Route::post('new', 'ActivityController@create');
        Route::get('new', 'ActivityController@new');
        Route::delete('{id}', 'ActivityController@destroy');
        Route::patch('{id}', 'ActivityController@update');
        Route::get('{id}', 'ActivityController@edit');
    });

    Route::prefix('actie')->group(function () {
        Route::get('/', 'ActionController@admin');
        Route::post('new', 'ActionController@create');
        Route::get('new', 'ActionController@new');
        Route::delete('{id}', 'ActionController@destroy');
        Route::patch('{id}', 'ActionController@update');
        Route::get('{id}', 'ActionController@edit');
    });

    Route::prefix('uitdaging')->group(function () {
        Route::get('/', 'ChallengeController@admin');
        Route::post('new', 'ChallengeController@create');
        Route::get('new', 'ChallengeController@new');
        Route::patch('{id}', 'ChallengeController@update');
        Route::get('{id}', 'ChallengeController@edit');
    });
});
