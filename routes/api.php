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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//user
Route::post('/register','Api\AuthController@register');
Route::post('/login','Api\AuthController@login');
Route::get('/details', 'Api\AuthController@users');
Route::get('/detail/{id}', 'Api\AuthController@user');
Route::put('/update/{id}', 'Api\AuthController@updateUser');
Route::delete('/delete/{id}', 'Api\AuthController@deleteUser');

//Account
Route::get('/accounts','Api\AccController@accounts');
Route::get('/account/{id}', 'Api\AccController@account');