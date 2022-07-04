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
                    "environment" => "sandbox",
                    'merchantId' => 'ps4gm72zzbgjdgdn',
                    'publicKey' => 'v4443nqpstrchxhn',
                    'privateKey' => '72337f43157bc9aa13cf45fdbdc38137'
                ]
            );
        });
    }
}
