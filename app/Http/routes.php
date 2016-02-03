<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */

/**
 * View routing
 */
Route::get('/', function () {
    return view('welcome');
});

// Authentication
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

// If user is authenticated then allow to view resources
Route::group(['middleware' => 'auth'], function () {

    // Dashboard
    Route::get('dashboard', 'DashboardController@index');

    // Users
    Route::resource('usuarios', 'UsersController', [
        'except' => ['show', 'store', 'update', 'destroy'],
    ]);

    // Orders
    Route::get('ordenes/compras', 'OrdersController@purchase');
    Route::get('ordenes', 'OrdersController@index');
    Route::post('orders', 'OrdersController@store');

    // Products
    Route::get('productos', 'ProductsController@index');
    Route::get('productos/agregar', 'ProductsController@create');
    Route::post('productos', 'ProductsController@store');
    Route::post('productos/{id}', 'ProductsController@update');
    Route::get('productos/{id}', 'ProductsController@show');
    Route::get('productos/buscar/{keyword}', 'ProductsController@search');
    Route::delete('productos', 'ProductsController@destroy');

    // Inventario
    Route::get('inventario/reportes', 'InventoryController@index');
    Route::get('inventario/ingresar', 'InventoryController@create');

});

/**
 * API routing
 */
Route::group(['prefix' => 'api/v1'], function () {

    // Route::get('users', ['as' => 'api.v1.users.showall', 'uses' => 'UsersController@showAll']);

    // Route::resource('users', 'UsersController', [
    //     'except' => ['create', 'index', 'edit'],
    // ]);

    Route::resource('orden', 'OrdersController');
    Route::get('productos/buscar/{keyword}', 'ProductsController@search');

});

// Route::get('api/v1/users', 'UsersController@showAll');
// Route::get('api/v1/users/{key}', 'UsersController@show');
