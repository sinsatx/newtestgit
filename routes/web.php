<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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






Route::get('/example','ExampleController@index');


Route::post('/example','ExampleController@store')->name('example-create');



Route::delete('/example','ExampleController@delete')->name('example-delete');


Route::put('/example','ExampleController@update')->name('example-update');










































































