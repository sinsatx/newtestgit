<?php

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

Route::get('/', function () {
    // return view('layouts.welcome'); //seria dentro de la carpeta de layouts
    return view('welcome');
});

Route::get('/profile',function(){
return view('profile');


});



Route::get('/profile/editar',function(){
    return "Estas editando";
    
    
    });


// http://localhost:8000/ver/10/email@sade y sale: estas viendo el perfil numero 10con el email email@sade

// como hay 2 parametros si pones el http://localhost:8000/ver/10/ te sale error 

Route::get('/ver/{id}','ProfileController@index');


    // para no tener que poner cada vez profile como esta ahi directamente lo metes en un grupo

                  // prefijo   // admin /alias /alias

    Route:: group(['prefix' => 'admin','as' =>'admin'], function(){

Route::get('/', 'AdminController@index');

Route::get('/usuarios', 'UsersController@index');

Route::post('/usuarios/edit', 'UsersController@EditarUsuario');

Route::get('/productos', 'ProductosController@index');

Route::post('/productos/all', 'ProductosController@all');
 
route::get('/productos/imprimir','ProductosController@imprimir');

// Route::post('/usuarios', 'UsersController@store');  voy a usar Resources

// Con Resource usas todo, el ver, editar, crear y eliminar

Route::resource('usuarios','UsersController');

//         /admin/usuario no es necesario

Route::resource('productos','productosController');


    });
    
    
    
    
    
    
    
    
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
