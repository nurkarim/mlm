<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;
use Auth;
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
        Validator::extend('checkFunds', function($attribute, $value, $parameters) {
            return Auth::user()->funds_amount > $value;
        });
    }
}
