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
Route::post('/addcanteen','CanteenController@add')->name('addcanteen');

Route::get('/show','CanteenController@show')->name('canteens');
Route::get('/canteens', function (){
return view('show')->name('show');
});
Route::get('/get-ctn/{id}','CanteenController@showSimpleCanteen');
Route::post('/edit-ctn','CanteenController@edit')->name('edit');
//Route::get('/getcanteen/{id}','CanteenController@getCanteen');
Route::get('/delete/{id}','CanteenController@delete');
Route::get('/meal',function(){
   return view('meal'); 
});
Route::post('/addmeal','MealController@create')->name('addmeal');
Route::get('/showmeal','MealController@store')->name('showmeal');

Route::get('/editUser', 'UserController@edit')->name('editUser');
Route::post('/update','UserController@update')->name('update');
