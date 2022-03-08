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

Route::get('/', function () {
    return view('guest.welcome');
});

Auth::routes();

Route::middleware('auth') //controllo se sono loggato
    ->namespace('Admin')
    ->name('admin.') //name
    ->prefix('admin') //uri
    ->group(function () {
        Route::get('/', 'HomeController@index')
            ->name('home');
            Route::resource('boolpresses', 'BoolpressController');
            Route::resource('categories', 'CategoryController');
    });

    Route::get("{any?}", function () {
        return view("guest.welcome");
      })->where("any", ".*");
