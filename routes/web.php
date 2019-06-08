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

Route::get('/search/{id}','CityController@cityName')->name('cityName');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//search user post
Route::get('/searchUserPost', 'SearchController@searchUserPosts')->name('searchUserPosts');


Route::resource('addForm', 'MarketPosts');
Route::DELETE('/deleteProduct', 'MarketPosts@deleteProduct')->name('addForm.deleteProduct');

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
    Route::DELETE('/controlProducts/', 'adminController@destroyProduct')->name('admin.destroyProduct');

    //Refactoring All existing Markets
    Route::get('/controlMarkets', 'adminController@controlMarkets')->name('controlMarkets');
    Route::DELETE('/controlMarkets', 'adminController@destroyMarket')->name('admin.destroyMarket');
    Route::PUT('/controlProducts', 'adminController@UpdateApprovement')->name('controlProducts.UpdateApprovement');
    Route::get('/getAjaxContent', 'adminController@getAjaxContent')->name('getAjaxContent');
});

Route::get('/getContentSportMaster', 'ParserController@getContentSportMaster')->name('getContentSportMaster');
Route::get('/getGloariyaJeans', 'ParserController@getGloariyaJeans')->name('getGloariyaJeans');