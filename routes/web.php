<?php

Route::get('/', function () {
    return view('_partials.app');
});
Route::get('login', 'Auth\LoginController@login')->name('login');
Route::post('login', 'Auth\LoginController@checkLogin')->name('login');
Route::get('logout', 'Auth\LoginController@logout')->name('login.logout');
Route::get('checkPosition', 'Auth\RegisterController@checkPosition')->name('checkPosition');
Route::get('checkDiscountCode', 'Auth\RegisterController@checkDiscountCode')->name('checkDiscountCode');
Route::post('register', 'Auth\RegisterController@store')->name('register.store');

Route::get('register', function() {
    return view('register');
})->name('register');

// ================================user portal=======================
Route::get('/email/verify/{token}', 'Auth\RegisterController@verifyUser');
Route::group(['prefix' => 'dashboard'], function() {
    
    Route::get('/', 'DashboardController@dashboard')->name('dashboard.app');
    // ================================genealogy================================
    Route::get('genealogy', 'DashboardController@genealogy')->name('genealogy.tree');
    Route::get('genealogy/{id}', 'DashboardController@genealogyNext')->name('genealogy.show');
    // ================================Buying Position================================
    Route::get('position/purchase', 'UserController@create')->name('position.create');
    Route::post('position/purchase', 'UserController@store')->name('position.post');
    Route::resource('addFunds', 'AddFundsController');
});