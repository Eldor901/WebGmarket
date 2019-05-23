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

Route::get('/','CityController@welcome')->name('/');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('addForm', 'MarketPosts');

//search product by city and name
Route::get('/search', 'SearchController@search')->name('search');

//show result
Route::get('/search/{search_panel}/show', 'SearchController@showProduct')->name('search.show');

// products refactoring
Route::get('home/{id}/edit', 'HomeController@edit')->name('showProduct');

// market update
Route::PUT('home/{id}/update', 'HomeController@update')->name('home/update');

Route::group(['middleware' => 'auth'], function()
{
    Route::get('/admin', 'adminController@admin')->middleware('admin');
    // Refactoring All Products
    Route::get('/controlProducts', 'adminController@controlProducts')->name('controlProducts');
    Route::DELETE('/controlProducts/{id}', 'adminController@destroyProduct')->name('admin.destroyProduct');

    //Refactoring All existing Markets
    Route::get('/controlMarkets', 'adminController@controlMarkets')->name('controlMarkets');
    Route::DELETE('/controlMarkets', 'adminController@destroyMarket')->name('admin.destroyMarket');
    Route::PUT('/controlProducts/{id}', 'adminController@UpdateApprovement')->name('controlProducts.UpdateApprovement');
});