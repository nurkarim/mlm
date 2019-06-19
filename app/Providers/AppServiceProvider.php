<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;
use Auth;
use App\User;
class AppServiceProvider extends ServiceProvider
{
    
    public function register()
    {
        //
    }

   
    public function boot()
    {
        Validator::extend('checkFunds', function($attribute, $value, $parameters) {
            return Auth::user()->funds_amount > $value;
        });

        Validator::extend('username', function($attribute, $value, $parameters) {
            $user=User::where('user_name',$value)->count();
            return $user > 0;
        }); 
       
    }
}
