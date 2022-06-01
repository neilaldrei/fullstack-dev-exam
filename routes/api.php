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


Route::group(['prefix' => 'v1'], function () {

    Route::group(['namespace' => 'V1\Tour'], function () {
        Route::resource('tours', 'TourController');
        Route::resource('tour-dates', 'TourDateController');
    });

    Route::group(['namespace' => 'V1\Passenger'], function () {
        Route::resource('passengers', 'PassengerController');
    });

    Route::group(['namespace' => 'V1\Booking'], function () {
        Route::resource('bookingstou', 'BookingController');
    });
});