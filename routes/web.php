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



//Route to Canteen
Route::get('/add', function(){
    return view('add');
});
Route::post('/addcanteen','CanteenController@add')->name('addcanteen');

Route::get('/show','CanteenController@show')->name('canteens');
Route::get('/canteens', function (){
return view('show')->name('show');
});
Route::get('/get-ctn/{id}' , 'CanteenController@showSimpleCanteen');
Route::post('/edit-ctn','CanteenController@edit')->name('edit');
//Route::get('/getcanteen/{id}','CanteenController@getCanteen');
Route::get('/delete/{id}','CanteenController@delete');
Route::get('/myCanteens' , 'CanteenController@show')->name('myCanteens');
Route::get('canteenMeal/{id}','CanteenController@canteenMeal');
Route::post('addMealCanteen' , 'CanteenController@addMeal')->name('CanteenMeal');



//Meal route
Route::get('/meal','MealController@addview')->name('meal');
Route::post('/addmeal','MealController@create')->name('addmeal');
Route::get('/storemeal','MealController@store')->name('storemeal');
//Route::get('/showmeal/{id}','MealController@show')->name('showmeal');
Route::post('/showmeal','MealController@showp')->name('showmeal');



//User route
Route::get('/editUser', 'UserController@edit')->name('editUser');
Route::post('/update','UserController@update')->name('update');



//Ingredient route
Route::get('/ingredient',function(){
return view('addIngredient');
})->name('ingredient');
Route::post('/addingredient','IngredientController@create')->name('addingredient');
Route::get('/storeingredient','IngredientController@store')->name('storeingredient');
Route::get('/get-ing/{id}','IngredientController@show');
Route::post('/editIngredient','IngredientController@edit')->name('editIngredient');
Route::get('/deleteing/{id}','IngredientController@delete');


//Options route
Route::get('/option' , function(){
    return view('option');
})->name('option');
Route::post('/addoption' , 'OptionsController@create')->name('addoption');
Route::get('/storeoptions' , 'OptionsController@store')->name('storeoptions');
Route::get('/destroy/{id}','OptionsController@destroy');
Route::get('/showSimple/{id}' , 'OptionsController@show');
Route::post('/editOption' , 'OptionsController@edit')->name('editOpt');



// Order routes
Route::get('selectCanteen' , 'OrderController@selectCanteen');
Route::get('/orderMeal/{id}' , 'OrderController@selectCanteenMeals');
Route::Post('/setOrder' , 'OrderController@createOrder')->name('order');

