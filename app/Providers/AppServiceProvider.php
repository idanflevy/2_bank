<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use  Illuminate\Support\Facades\Schema;


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
        Schema::defaultStringLength(191);
        //
    }
}
// Client ID: 1
// Client secret: CpmQGehPOHy89UnyaR004pDHyqGXkVF8gDahL3Am
// Password grant client created successfully.
// Client ID: 2
// Client secret: zyskYk08JnFLgMHxcbL1XmQKUZZXLXWWS9cgleIf