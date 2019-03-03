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
Route::get('/add', function(){
    return view('add');
});
Route::post('/addcanteen','CanteenController@add')->name('add');
Route::get('/show','CanteenController@show')->name('canteens');
Route::get('/canteens', function (){
return view('show')->name('show');
});
Route::get('/get-ctn/{id}','CanteenController@showSimpleCanteen');
