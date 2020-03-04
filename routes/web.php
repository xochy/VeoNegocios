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

//?Rutas para Category

Route::resource('categories', 'CategoryController');

Route::get('/cancelActionCategory/{category}', function ($category) {
    return redirect()->route('showCategoryInformation', $category)->with('statusCancel', 'Acción cancelada');
})->name('categories.cancelAction');

Route::get('/categories/{category}/confirmAction', 'CategoryController@confirmAction')->name('categories.confirmAction');

Route::get('/categories/{category}', 'CategoryController@show')->name('showCategoryInformation');

//?Rutas para Stores

Route::resource('stores', 'StoreController');

Route::get('/createFromCategory/{category}', 'StoreController@createFromCategory')->name('stores.createFromCategory');

Route::post('/categories/{category}', 'StoreController@storeFromCategory')->name('stores.storeFromCategory');

Route::resource('products', 'ProductController');