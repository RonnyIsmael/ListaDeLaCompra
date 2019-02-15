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




//Route::get('login', 'HomeController@getLogin');


//Route::get('logout', 'HomeController@getLogout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index');

    Route::group(['prefix' => 'productos'], function () {

        Route::get('/{categorias?}', 'ProductoController@getIndex');
        Route::get('/index/{productosCategoria}','ProductoController@getProductosCategoria');

        Route::get('show/{id}', 'ProductoController@getShow');


        Route::get('create', 'ProductoController@getCreate');
        Route::post('create', 'ProductoController@postCreate');


        Route::get('edit/{id}', 'ProductoController@getEdit');
        Route::put('edit/{id}', 'ProductoController@putEdit');

        Route::put('changeComprado/{id}', 'ProductoController@changeComprado');


    });

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
