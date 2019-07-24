<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'auth'], function () {
    Route::post('/login', 'Api\AuthController@login');
    Route::post('/signup', 'Api\AuthController@signup');
});

Route::group(['middleware' => 'auth:api', 'prefix' => 'application'], function() {
    Route::get('/canteens/{id?}', 'Api\CanteensController@canteens');//Zwraca liste jadalni wszystkich lu jeśli dać jako parametr w url id jadalni to zwruci konkretną potrawę
    Route::get('/meals/{id?}', 'Api\CanteensController@meals');// Zwraca liste potraw wszystkich lu jeśli dać jako parametr w url id potrawy to zwruci konkretną potrawę
    Route::get('/options', 'Api\CanteensController@options');//Zwraca liste opcij wszystkich
    Route::post('/box', 'Api\CanteensController@box');//Zlozenie zamowienia
    Route::get('/getBox/{id}', 'Api\CanteensController@getBoxOrder');//wszystko co jest w koszu 
    Route::post('/order', 'Api\CanteensController@orderSuccess');//Podtwierdzenie zamowienia jako parametr wysłać id_order
    Route::get('/canteen/{id}/meals', 'Api\CanteensController@getCanteenMeals');//Zwraca liste potraw w konkretnej jadalni jako parametr w url wpisz id jadalni
    Route::delete('/delete/meal/box', 'Api\CanteensController@deleteFromBox'); //Usunięcie potrawy z kosza jako parametry trzeba id_order, id_meal
});