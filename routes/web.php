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

use App\Address;
use App\Category;
use App\Product;
use App\Store;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//?Rutas para Category

Route::resource('categories', 'CategoryController');

Route::get('/cancelActionCategory/{category}', function (Category $category) {
    return redirect()->route('categories.show', $category)->with('statusCancel', 'Acción cancelada');
})->name('categories.cancelAction');

Route::get('/categories/{category}/confirmAction', 'CategoryController@confirmAction')->name('categories.confirmAction');

//?Rutas para Stores

Route::resource('stores', 'StoreController');

Route::get('/createFromCategory/{category}', 'StoreController@createFromCategory')->name('stores.createFromCategory');

Route::post('/categories/{category}', 'StoreController@storeFromCategory')->name('stores.storeFromCategory');

Route::get('/storedStore/{store}', function (Store $store) {
    return redirect()->route('stores.show', $store)->with('statusSuccess', 'Negocio almacenado correctamente');
})->name('store.stored');

Route::get('/updatedStore/{store}', function (Store $store) {
    return redirect()->route('stores.show', $store)->with('statusSuccess', 'Negocio actualizado correctamente');
})->name('store.updated');

Route::get('/deletedStore/{category}', function (Category $category) {
    return redirect()->route('categories.show', $category)->with('statusSuccess', 'Negocio eliminado correctamente');
})->name('store.deleted');

Route::get('/stores/{store}/confirmAction', 'StoreController@confirmAction')->name('stores.confirmAction');

Route::get('/cancelActionStore/{store}', function (Store $store) {
    return redirect()->route('stores.show', $store)->with('statusCancel', 'Acción cancelada');
})->name('stores.cancelAction');

//?Rutas para Addresses
Route::resource('addresses', 'AddressController');

Route::get('/createAddress/{store}', 'AddressController@createFromStore')->name('addresses.createFromStore');

Route::post('/storeAddress/{store}', 'AddressController@storeFromStore')->name('addresses.storeFromStore');

Route::get('/storedAddress/{store}', function (Store $store) {
    return redirect()->route('stores.show', $store)->with('statusSuccess', 'Dirección almacenada correctamente');
})->name('addresses.stored');

Route::get('/updatedAddress/{store}', function (Store $store) {
    return redirect()->route('stores.show', $store)->with('statusSuccess', 'Dirección actualizada correctamente');
})->name('addresses.updated');

Route::get('/deletedAddress/{store}', function (Store $store) {
    return redirect()->route('stores.show', $store)->with('statusSuccess', 'Dirección eliminada correctamente');
})->name('addresses.deleted');

Route::get('/addresses/{address}/confirmAction', 'AddressController@confirmAction')->name('addresses.confirmAction');

Route::get('/cancelActionAddress/{address}', function (Address $address) {
    return redirect()->route('stores.show', $address->store)->with('statusCancel', 'Acción cancelada');
})->name('addresses.cancelAction');

//?Rutas para Products
Route::resource('products', 'ProductController');

Route::get('/createProduct/{store}', 'ProductController@createFromStore')->name('products.createFromStore');

Route::post('/storeProduct/{store}', 'ProductController@storeFromStore')->name('products.storeFromStore');

Route::get('/storedProduct/{store}', function (Store $store) {
    return redirect()->route('stores.show', $store)->with('statusSuccess', 'Producto almacenado correctamente');
})->name('products.stored');

Route::get('/updatedProduct/{store}', function (Store $store) {
    return redirect()->route('stores.show', $store)->with('statusSuccess', 'El producto se ha actualizado correctamente');
})->name('products.updated');

Route::get('/deletedProduct/{store}', function (Store $store) {
    return redirect()->route('stores.show', $store)->with('statusSuccess', 'El producto se ha eliminado correctamente');
})->name('products.deleted');

Route::get('/products/{product}/confirmAction', 'ProductController@confirmAction')->name('products.confirmAction');

Route::get('/cancelActionProduct/{product}', function (Product $product) {
    return redirect()->route('stores.show', $product->store)->with('statusCancel', 'Acción cancelada');
})->name('products.cancelAction');