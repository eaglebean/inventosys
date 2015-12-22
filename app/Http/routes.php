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
Route::get('orders', 'OrdersController@index');
Route::post('orders/store', 'OrdersController@store');

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

});

/**
 * API routing
 */
Route::group(['prefix' => 'api/v1'], function () {

    Route::get('users', ['as' => 'api.v1.users.showall', 'uses' => 'UsersController@showAll']);

    Route::resource('users', 'UsersController', [
        'except' => ['create', 'index', 'edit'],
    ]);

});

// Route::get('api/v1/users', 'UsersController@showAll');
// Route::get('api/v1/users/{key}', 'UsersController@show');
