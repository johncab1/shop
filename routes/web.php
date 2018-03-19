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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'TestController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

Route::get('/products', 'ProductController@index'); //listado
Route::get('/products/create', 'ProductController@create'); //crear productos
Route::post('/products', 'ProductController@store');

Route::get('/products/{id}/edit', 'ProductController@edit'); // vista de edición
Route::post('/products/{id}/edit', 'ProductController@update'); //actualizar

Route::post('/products/{id}/delete', 'ProductController@destroy');

});

