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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('jobs/create', 'JobController@create')->name('jobs.create');
    Route::post('jobs', 'JobController@store')->name('jobs.store');
    Route::put('jobs/{job}', 'JobController@update')->name('jobs.update');
    Route::get('jobs/{job}', 'JobController@show')->name('jobs.show');
    Route::get('jobs/{job}/edit', 'JobController@edit')->name('jobs.edit');
});