<?php

Route::get('/', function () {
    return view('_partials.app');
});

Route::get('login', 'Auth\LoginController@login')->name('login');
Route::post('login', 'Auth\LoginController@checkLogin')->name('login');


Route::get('register', function() {
    return view('register');
})->name('register');
