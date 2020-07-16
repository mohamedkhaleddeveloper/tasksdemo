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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'Auth\LoginController@login');
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/loginp', 'Auth\LoginController@loginp');
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/change-lang', 'HomeController@updateUserlang');


Route::prefix('stuffs')->group(function () {
    Route::get('/', 'AdminController@index');
    Route::get('/getstuffs', 'AdminController@getstuff');
    Route::post('/store', 'AdminController@store');
    Route::post('/update/{stuff}', 'AdminController@update');
    Route::get('/show/{stuff}', 'AdminController@show');
    Route::post('/update_password/{stuff}', 'AdminController@update_password');
    Route::post('/destroy/{stuff}', 'AdminController@destroy');
    Route::post('/roles/{stuff}', 'AdminController@roles');
    Route::get('/editeuser', 'AdminController@editeuser');
    Route::get('/getroles/{stuff}', 'AdminController@getroles');
    Route::get('/getjobs/{jobs}', 'AdminController@getjobs');
});

Route::prefix('tickets')->group(function () {
    Route::get('/', 'TicketController@index');
    Route::get('/getitems', 'TicketController@getitems');
    Route::post('/store', 'TicketController@store');
    Route::post('/update/{item}', 'TicketController@update');
    Route::get('/show/{item}', 'TicketController@show');
    Route::post('/destroy/{item}', 'TicketController@destroy');
});

