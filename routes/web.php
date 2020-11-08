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
use App\City;
use App\Comment;
use App\Network;
use App\Product;
use App\Store;
use App\User;

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

//?Rutas para países

Route::resource('cities', 'CityController');

Route::get('/storedCity/{city}', function (City $city) {
    return redirect()->route('cities.index', $city)->with('statusSuccess', 'Localidad agregada correctamente');
})->name('cities.stored');

Route::get('/updatedCity/{city}', function (City $city) {
    return redirect()->route('cities.index', $city)->with('statusSuccess', 'Localidad actualizado correctamente');
})->name('cities.updated');

Route::get('/deletedCity', function () {
    return redirect()->route('cities.index')->with('statusSuccess', 'Localidad eliminada correctamente');
})->name('cities.deleted');

Route::get('/cancelActionCity/{city}', function (City $city) {
    return redirect()->route('cities.index', $city)->with('statusCancel', 'Acción cancelada');
})->name('cities.cancelAction');

Route::get('/cities/{city}/confirmAction', 'CityController@confirmAction')->name('cities.confirmAction');

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

Route::get('/loadFromCity/{citySlug}', 'StoreController@loadFromCity')->name('stores.loadFromCity');

//!Rutas para los usuarios costumer
Route::get('/stores/{user}/showStoreCostumer', 'StoreController@showStoreCostumer')->name('stores.showStoreCostumer');

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

//?Rutas para contactos
Route::resource('networks', 'NetworkController');

Route::get('/createNetwork/{store}', 'NetworkController@createFromStore')->name('networks.createFromStore');

Route::post('/storeNetwork/{store}', 'NetworkController@storeFromStore')->name('networks.storeFromStore');

Route::get('/storedNetwork/{store}', function (Store $store) {
    return redirect()->route('stores.show', $store)->with('statusSuccess', 'Contacto almacenado correctamente');
})->name('networks.stored');

Route::get('/updatedNetwork/{store}', function (Store $store) {
    return redirect()->route('stores.show', $store)->with('statusSuccess', 'El contacto se ha actualizado correctamente');
})->name('networks.updated');

Route::get('/deletedNetwork/{store}', function (Store $store) {
    return redirect()->route('stores.show', $store)->with('statusSuccess', 'El contacto se ha eliminado correctamente');
})->name('networks.deleted');

Route::get('/networks/{network}/confirmAction', 'NetworkController@confirmAction')->name('networks.confirmAction');

Route::get('/cancelActionNetwork/{network}', function (Network $network) {
    return redirect()->route('stores.show', $network->store)->with('statusCancel', 'Acción cancelada');
})->name('networks.cancelAction');

//?Rutas para comentarios
Route::resource('comments', 'CommentController');

Route::get('/createComment/{store}', 'CommentController@createFromStore')->name('comments.createFromStore');

Route::post('/storeComment/{store}', 'CommentController@storeFromStore')->name('comments.storeFromStore');

Route::get('/storedComment/{store}', function (Store $store) {
    return redirect()->route('stores.show', $store)->with('statusSuccess', 'Comentario creado correctamente');
})->name('comments.stored');

Route::get('/updatedComment/{store}', function (Store $store) {
    return redirect()->route('stores.show', $store)->with('statusSuccess', 'El comentario se ha actualizado correctamente');
})->name('comments.updated');

Route::get('/deletedComment/{store}', function (Store $store) {
    return redirect()->route('stores.show', $store)->with('statusSuccess', 'El comentario se ha eliminado correctamente');
})->name('comments.deleted');

Route::get('/comments/{comment}/confirmAction', 'CommentController@confirmAction')->name('comments.confirmAction');

Route::get('/cancelActionComment/{comment}', function (Comment $comment) {
    return redirect()->route('stores.show', $comment->store)->with('statusCancel', 'Acción cancelada');
})->name('comments.cancelAction');

//?Rutas para Usuarios
Route::resource('users', 'UserController');

Route::get('/users/{user}/confirmAction', 'UserController@confirmAction')->name('users.confirmAction');

Route::get('/cancelActionUser', function () {
    return redirect()->route('users.index')->with('statusCancel', 'Acción cancelada');
})->name('users.cancelAction');


//usuario o negocio prospecto
Route::get('prospecto', 'Userprospecto@index');
