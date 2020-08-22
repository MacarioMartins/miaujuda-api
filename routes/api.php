<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/users', 'UserController@store');
// Route::middleware('auth:api')->get('/users', 'UserController@index');
// Route::middleware('auth:api')->get('/users/{id}', 'UserController@show');
// Route::middleware('auth:api')->put('/users/{id}', 'UserController@update');
// Route::middleware('auth:api')->delete('/users/{id}', 'UserController@delete');


Route::post('/organizations', 'OrganizationController@store');
