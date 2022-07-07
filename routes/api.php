<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();
Route::namespace('Api')->name('api.')->group(function () {
    Route::post("/messages", "MessageController@store")->name('messages.store');
    Route::post("/views", "ViewController@store")->name("view.store");
});

Route::get('/apartments', 'Api\ApartmentController@index')->name('index');
Route::get('/apartments/{id}', 'Api\ApartmentController@show')->name('apartments.show');
