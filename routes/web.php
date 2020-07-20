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


Route::get('/group/{slug}', 'Web\PageController@group')->name('group');

//Se generar las rutas administrativas

Auth::routes();

Route::get('/loginteacher', function(){
    return view('admin.loginteacher');
});

Route::resource('groups', 'Admin\GroupController');

Route::resource('units', 'Admin\UnitController');

Route::resource('posts', 'Admin\PostController');



//Se generaron rutas de prueba


Route::get('/vclass', 'Web\PageController@vclass')->name('vclass');

Route::get('/vclass/{slug}', 'Web\PageController@post')->name('post');

Route::get('/unit/{slug}', 'Web\PageController@unit')->name('unit');

Route::get('/allgroup', 'Web\PageController@allgroup')->name('allgroup');


//Ruta para los modulos read and write
Route::resource('/read','Web\LibroController');
Route::resource('/write','Web\LibroController');

//Rutas para reacciones
Route::get('/Prueba/{idlike}/{like}', 'Web\LibroController@like')->name('like');
Route::patch('/Prueba/{idsmile}/{smile}', 'Web\LibroController@smile')->name('smile');
Route::put('/Prueba/{idsorpess}/{sorpess}', 'Web\LibroController@sorpess')->name('sorpess');

Route::get('/allunit', 'Web\PageController@allunit')->name('allunit');

Route::get('/allgroup/{grpsl}/{slug}', 'Web\PageController@filtro')->name('filtro');


