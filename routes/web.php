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
    return view('inicio');
});

Route::get('/home', function(){
    return view('home');
});

Route::get('/Prueba', function(){
    return view('Prueba');
});

//Se generar la vista para el aula virtual

Route::get('groups', 'Web\PageController@groups')->name('groups');

//Se generaron rutas de prueba
Auth::routes();

Route::redirect('/class','vclass');

Route::get('vclass', 'Web\PageController@vclass')->name('vclass');

Route::get('vclass{slug}', 'Web\PageController@post')->name('post');

Route::get('unit{slug}', 'Web\PageController@unit')->name('unit');

Route::get('group{slug}', 'Web\PageController@group')->name('group');


//Admin
