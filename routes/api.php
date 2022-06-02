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
        // Tours
        Route::get('/tours', 'TourController@index')->name('tour.index');
        Route::post('/tours', 'TourController@store')->name('tour.store');
        Route::get('/tours/{tour}', 'TourController@show')->name('tour.show');
        Route::put('/tours/{tour}', 'TourController@update')->name('tour.update');
        Route::delete('/tours/{tour}', 'TourController@destroy')->name('tour.delete');
        
        // Tour Dates
        Route::post('/tour-dates', 'TourDateController@store')->name('tour-date.store');
        Route::put('/tour-dates/{tourDate}', 'TourDateController@update')->name('tour-date.update');
        Route::delete('/tour-dates/{tourDate}', 'TourDateController@delete')->name('tour-date.delete');
    });

    Route::group(['namespace' => 'V1\Passenger'], function () {
        
        // Passengers
        Route::get('/passengers', 'passengerController@index')->name('passenger.index');
        Route::post('/passengers', 'passengerController@store')->name('passenger.store');
        Route::get('/passengers/{passenger}', 'passengerController@show')->name('passenger.show');
        Route::put('/passengers/{passenger}', 'passengerController@update')->name('passenger.update');
        Route::delete('/passengers/{passenger}', 'passengerController@delete')->name('passenger.delete');
    });

    Route::group(['namespace' => 'V1\Booking'], function () {

        // Bookings
        Route::get('/bookings', 'BookingController@index')->name('booking.index');
        Route::post('/bookings', 'BookingController@store')->name('booking.store');
        Route::get('/bookings/{booking}', 'BookingController@show')->name('booking.show');
        Route::put('/bookings/{booking}', 'BookingController@update')->name('booking.update');
        Route::delete('/bookings/{booking}', 'BookingController@delete')->name('booking.delete');
        Route::delete('/bookings/{booking}/remove', 'BookingController@removePassenger')->name('booking.remove');
    });
});