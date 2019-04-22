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

Route::get('storeCoinPayment', 'AddFundsController@storeCoinPayment')->name('storeCoinPayment');

Route::get('register', function() {
    return view('register');
})->name('register');

Route::post('requestCode', 'Auth\RegisterController@requestCode')->name('requestCode.store');
Route::get('/requestCode', function () {
    return view('requestCode');
});
// ================================user portal=======================
Route::get('/email/verify/{token}', 'Auth\RegisterController@verifyUser');
Route::group(['prefix' => 'dashboard','middleware'=>'auth'], function() {
    
    Route::get('/', 'DashboardController@dashboard')->name('dashboard.app');
    // ================================genealogy================================
    Route::get('genealogy', 'DashboardController@genealogy')->name('genealogy.tree');
    Route::get('genealogy/{id}', 'DashboardController@genealogyNext')->name('genealogy.show');
    // ================================Buying Position================================
    Route::get('position/purchase', 'UserController@create')->name('position.create');
    Route::post('position/purchase', 'UserController@store')->name('position.post');
    Route::resource('addFunds', 'AddFundsController');
    Route::resource('fundsTransfer', 'FundsTransferController');
    Route::resource('withdrawals', 'WithdrawalController');

    // =================================History===============================
    Route::get('fundsHistory', 'HistroyController@fundsHistory')->name('user.fundsHistory');
    Route::get('transactions', 'HistroyController@transactionHistory')->name('user.transaction');
    Route::get('my-discount', 'HistroyController@discounts')->name('user.discount');
    Route::get('my-earning', 'HistroyController@commission')->name('earning.index');

    // =======================================usercontroller===========================
    Route::get('my-profile', 'UserController@myProfile')->name('user.profile');
    Route::post('my-profile', 'UserController@saveProfile')->name('user.profileUpdate');
    Route::get('passwordChange', 'UserController@password')->name('user.password');
    Route::post('passwordChange', 'UserController@passwordChange')->name('user.storePassword');

    // ==================================EbookController=========================================
    Route::get('ebooks', 'EbookController@index')->name('ebook');
    Route::get('support/compose', 'SupportController@create')->name('support.compose');
    Route::get('support/show/{id}', 'SupportController@show')->name('support.show');
    Route::post('support/compose', 'SupportController@store')->name('support.store');
    Route::post('support/delete', 'SupportController@delete')->name('support.delete');
    Route::get('support/inbox', 'SupportController@index')->name('support.inbox');

    Route::get('testCoinbase', 'AddFundsController@coinbasePayment');
    

    Route::get('coinpayment/funds/history', 'AddFundsController@coinpayment')->name('dashboard.coinpayment');
  

});
Route::get('testPage', function() {
    return view('user.coinpayment.index');
});
Route::post('testCoinbasesa', 'CoinPaymentsController@manual_check')->name('testCoinbase.check');
Route::get('/affiliate/{user_name}', 'UserController@affiliate')->name('user.affiliate');

