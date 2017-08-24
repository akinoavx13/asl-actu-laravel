<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Http\Controllers\ActualityController;
use App\Http\Controllers\ApiActualitiesController;
use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PreferenceController;
use App\Http\Controllers\UserController;

Route::auth();

Route::group(['middleware' => ['auth']], function () use ($router) {
    ActualityController::routes($router);
});

Route::group(['prefix' => 'preferences', 'middleware' => ['auth']], function () use ($router) {
    PreferenceController::routes($router);
});

Route::group(['prefix' => 'categories', 'middleware' => ['admin']], function () use ($router) {
    CategoryController::routes($router);
});

Route::group(['prefix' => 'users', 'middleware' => ['auth']], function () use ($router) {
    UserController::routes($router);
});

Route::group(['prefix' => 'api', 'middleware' => 'api'], function () use ($router) {
    Route::post('login', 'AuthController@login');

    Route::post('/token', 'ApiDevicesTokenController@store');
});

Route::group(['prefix' => 'api', 'middleware' => 'auth:api'], function () use ($router) {
    Route::get('/actualities', 'ApiActualitiesController@index');
    Route::post('/actuality', 'ApiActualitiesController@store');

    Route::get('/categories', 'ApiCategoriesController@index');
    Route::get('/category/{id}/actualities', 'ApiCategoriesController@actualities');

    Route::post('/comment', 'ApiCommentsController@store');
});

