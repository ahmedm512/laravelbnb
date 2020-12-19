<?php

use App\Models\Bookables;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

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



Route::get('bookables', 'App\Http\Controllers\Api\BookablesController@index');
Route::get('bookables/{id}', 'App\Http\Controllers\Api\BookablesController@show');

Route::get('users', 'App\Http\Controllers\Api\UserController@index');
Route::get('user/{id}', 'App\Http\Controllers\Api\UserController@show');
