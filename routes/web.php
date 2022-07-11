<?php

use Carbon\Carbon;
use App\Apartment;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\MessageController;
use App\Sponsorship;
use Braintree\Gateway;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('home');
        Route::resource('/apartments', 'ApartmentController');
        Route::resource('apartments.messages', "MessageController");
        Route::resource('apartments.views', "ViewController");
        Route::get("/checkin/{id}", "ApartmentController@checkIn")->name("checkin");
        Route::get("/checkout/{sponsor_id}/{apartment_id}", "ApartmentController@checkOut")->name("checkout");
        Route::get('/confirmed', function () {
            return view('admin.confirmed');
        })->name('confirmed');
        Route::put('/payment/{id}', "ApartmentController@confirmed")->name('payment');
        Route::get('/stats/{id}', 'ChartController@index')->name("apartments.views.index");
    });


Route::get('{any?}', function () {
    return view('guest.home');
})->where('any', '.*');
