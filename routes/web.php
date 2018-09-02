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

Route::get('/search', 'SearchController@show');
Route::get('/products/json', 'SearchController@data');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}', 'ProductController@show');

Route::get('/categories/{category}', 'CategoryController@show');

Route::post('/cart', 'CartDetailController@store');
Route::delete('/cart', 'CartDetailController@destroy');
Route::post('/order', 'CartController@update');

Route::middleware(['auth', 'admin'])->prefix('admin')->namespace('admin')->group(function () {

Route::get('/products', 'ProductController@index'); //listado
Route::get('/products/create', 'ProductController@create'); //crear productos
Route::post('/products', 'ProductController@store');

Route::get('/products/{id}/edit', 'ProductController@edit'); // vista de edición
Route::post('/products/{id}/edit', 'ProductController@update'); //actualizar

Route::post('/products/{id}/delete', 'ProductController@destroy');

Route::get('/products/{id}/images', 'ImageController@Index');
Route::post('/products/{id}/images', 'ImageController@store');
Route::delete('/products/{id}/images', 'ImageController@destroy');


//seleccionar destacado
Route::get('/products/{id}/images/select/{image}', 'ImageController@select');



Route::get('/categories', 'CategoryController@index'); //listado
Route::get('/categories/create', 'CategoryController@create'); //crear productos
Route::post('/categories', 'CategoryController@store');
Route::get('/categories/{category}/edit', 'CategoryController@edit'); // vista de edición
Route::post('/categories/{category}/edit', 'CategoryController@update'); //actualizar
Route::post('/categories/{category}/delete', 'CategoryController@destroy');


});


