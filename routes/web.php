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
route::group(["prefix" => "/"],function(){
    Route::get('/', "FrontendController@getHome");
    
    Route::get('complete', "FrontendController@getComplete");
    
    Route::get('category/{id}/{slug}.html', "FrontendController@getCate");
    // Route::get('details/{id}/{slug}', "FrontendController@getDetail");
    Route::get('details/{id}/{slug}.html', "FrontendController@getDetail");
    Route::post('details/{id}/{slug}.html', "FrontendController@postDetail");
    
    Route::group(['prefix' => 'cart'], function () {
        Route::get('show', "CartController@getCart");
        Route::get('update', "CartController@getUpdateCart");
        
        route::post('add','CartController@postAddCart');
        
        Route::get('delete/{id}', "CartController@getDeleteCart");
        Route::get('deleteAll', "CartController@getDeleteAllCart");
    });
});

Route::group(['namespace' => 'Admin'], function () {
    Route::group(['prefix' => 'login','middleware'=>'CheckLoggedIn'], function () {
        Route::get('/',"LoginController@getLogin");
        route::post('/',"LoginController@postLogin");
    });
    route::group(['prefix'=>'admin','middleware'=>'CheckLoggedOut'],function(){
        route::get('home','HomeController@getHome');
        Route::group(['prefix' => 'category'], function () {
            Route::get('/', "CategoryController@getCate");
            Route::post('/', "CategoryController@postCate");

            Route::get('edit/{id}', "CategoryController@getEditCateID");
            Route::post('edit/{id}', "CategoryController@postEditCateID");

            Route::get('delete/{id}', "CategoryController@getDeleteCateID");
        });

        Route::group(['prefix' => 'product'], function () {
            Route::get('/',"ProductController@getProduct");

            Route::get('add',"ProductController@getAddProduct");
            Route::post('add',"ProductController@postAddProduct");

            route::get('edit/{id}',"ProductController@getEditProduct");
            route::post('edit/{id}',"ProductController@postEditProduct");

            route::get('delete/{id}',"ProductController@getDeleteProduct");
        });
    });

    Route::get('logout', "HomeController@getLogout");
});

Route::get('/home', 'HomeController@index')->name('home');
