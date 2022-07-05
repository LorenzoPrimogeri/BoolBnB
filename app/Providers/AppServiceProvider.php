<?php

namespace App\Providers;

use Braintree\Gateway;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->app->singleton(Gateway::class, function ($app) {
            return new Gateway(
                [
                    'environment' => 'sandbox',
                    'merchantId' => '6m8mbfbmhzkjsnqw',
                    'publicKey' => 'qpxzh4f37cvtp7bn',
                    'privateKey' => 'a97f9355f6eea0e15437838ebed6fc74'
                ],
            );
        });
    }
}
