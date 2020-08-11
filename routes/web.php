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

Route::get('/home', 'HomeController@index');
//Se generar la vista para el aula virtual


Route::get('/group/{slug}', 'Web\PageController@group')->name('group');

//Se generar las rutas administrativas

Auth::routes();

//Ruta de login para el Administrador
Route::get('/loginteacher', function(){
    return view('admin.loginteacher');
});

Route::resource('groups', 'Admin\GroupController');

Route::resource('units', 'Admin\UnitController');

Route::resource('posts', 'Admin\PostController');



//Se generaron rutas de prueba


Route::get('/vclass', 'Web\PageController@vclass')->name('vclass');

Route::get('/vclass/{slug}/{grpid}', 'Web\PageController@post')->name('post');

Route::get('/unit/{slug}', 'Web\PageController@unit')->name('unit');

//Ruta para los grupos
Route::get('/allgroup', 'Web\PageController@allgroup')->name('allgroup');


//Ruta para los modulos read and write
Route::resource('/read','Web\LibroController');
Route::resource('/write','Web\LibroController');

//Rutas para reacciones
Route::get('/read/{idlike}/{like}', 'Web\LibroController@like')->name('like');
Route::patch('/read/{idsmile}/{smile}', 'Web\LibroController@smile')->name('smile');
Route::put('/read/{idsorpess}/{sorpess}', 'Web\LibroController@sorpess')->name('sorpess');


//Ruta para las unidades
Route::get('/allunit', 'Web\PageController@allunit')->name('allunit');
//Ruta para los posts de los grupos deacuerdo a la unidad
Route::get('/allgroup/{grpsl}/{slug}', 'Web\PageController@filtro')->name('filtro');

//Ruta para la creación de un libro desde un post
Route::get('write/create/{idpost}/{namepost}', 'Web\LibroController@libropost' )->name('createlibropost');
//Buscamos los libros desde el boton de grupos en read
Route::get('/{groupname}/{idgroup}', 'Web\LibroController@lbrgroupread')->name('readgrouplbr');

