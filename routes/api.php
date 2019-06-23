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

Route::group(['prefix' => 'application'], function() {
    Route::get('/canteens', 'Api\CanteensController@canteens');
    Route::get('/meals/{id?}', 'Api\CanteensController@meals');
    Route::get('/options', 'Api\CanteensController@options');

});