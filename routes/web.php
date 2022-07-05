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
        Route::get('/messages', 'MessageController@index')->name('messages');
        Route::get("/checkin", "ApartmentController@sponsors")->name("checkin");
        Route::get("/checkout/{id}", "ApartmentController@checkOut")->name("checkout");
        Route::get('/confirmed', function () {
            return view('admin.confirmed');
        })->name('confirmed');
        Route::put('/payment', function (Request $request, Gateway $gateway) {
            $idSponsor = $request->id;
            $sponsor = Sponsorship::find($idSponsor);
            //   $apartment = Apartment::find(Apartment::id());
            //  $activeSponsor = $apartment->sponsorShips;
            $amount = $sponsor->price;
            $nonce = $request->payment_method_nonce;
            // $sponsorshipName = $sponsor->type;
            $result = $gateway->transaction()->sale([
                'amount' => $amount,
                'paymentMethodNonce' => $nonce,
                'options' => [
                    'submitForSettlement' => true
                ]
            ]);
            return view('admin.confirmed', ['sponsor' => $sponsor]);
        })->name('payment');
    });


Route::get('{any?}', function () {
    return view('guest.home');
})->where('any', '.*');
