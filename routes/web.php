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

Route::get('/','HomeController@index');
Route::get('/redirect','HomeController@redirect');
Route::get('/Seafood','HomeController@SeafoodPage');
Route::post('/Seafood','HomeController@SeafoodPageLoadMore');
Route::get('/Species','HomeController@SpeciesPage');
Route::post('/Species','HomeController@SpeciesPageLoadMore');
//google auth 
Route::get('auth/google', 'Auth\LoginController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\LoginController@handleGoogleCallback');
Route::get('auth/google/logout', 'Auth\LoginController@logout');
//razorpay Integration
Route::get('product', 'RazorpayController@razorpayProduct');
Route::post('paysuccess', 'RazorpayController@razorPaySuccess');
Route::post('razor-thank-you', 'RazorpayController@RazorThankYou');
//admin page
Route::get('/admin/PostProduct','adminController@index');
Route::post('/admin/PostProduct','adminController@postProduct');
//get single Item
Route::get('/singleItem/{category}/{prod_id}','singleItemController@index');
Route::post('/{prod_id}/addToCart','singleItemController@addToCart');
Route::post('/{prod_id}/buyNow','singleItemController@buyNow');