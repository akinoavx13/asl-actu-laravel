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
use App\Http\Controllers\PreferenceController;

Route::auth();

Route::group(['middleware' => ['auth']], function () use ($router)
{
    ActualityController::routes($router);
});

Route::group(['prefix' => 'preferences', 'middleware' => ['auth']], function () use ($router)
{
    PreferenceController::routes($router);
});