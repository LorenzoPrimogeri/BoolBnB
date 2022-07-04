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

Route::namespace('Api')->name('api.')->group(function () {
    Route::post("/messages", "MessageController@store")->name('messages.store');
});

Route::get('/apartments', 'Api\ApartmentController@index')->name('index');
Route::get('/apartments/{id}', 'Api\ApartmentController@show')->name('apartments.show');
Route::get('/payments/generate', 'Api\Payments\PaymentController@generate');
Route::get('/payments/make/payment', 'Api\Payments\PaymentController@makePayment');
Route::get('/sponsor', 'Api\Sponsors\SponsorShipController@index');
