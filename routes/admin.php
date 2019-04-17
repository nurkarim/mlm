<?php
Route::get('usernameCheck', 'DiscountConytroller@checkUserName')->name('userNameCheck');

Route::group(['middleware' => ['web','auth','adminAuth'],'prefix' => 'admin'], function() {
// ===================Route Admin================
Route::get('/', 'AdminController@dashboard')->name('adminPortal');
// ===================End Route Admin================
Route::get('commissions', 'CommissionSettingsController@index')->name('commission.index');
Route::post('commissions', 'CommissionSettingsController@store')->name('commission.store');
// ===================Discount Admin================
Route::get('discounts', 'DiscountConytroller@index')->name('discounts.index');
Route::post('discounts', 'DiscountConytroller@store')->name('discounts.store');
Route::post('discountDelete', 'DiscountConytroller@delete')->name('discounts.delete');
Route::get('checkUserName', 'DiscountConytroller@checkUserName')->name('userName.check');
// ===================End Discount Admin================

// ===================Ebooks================
Route::resource('ebooks', 'EbookController');
Route::post('ebooksDelete', 'EbookController@delete')->name('ebooks.delete');
// ===================Members================

Route::resource('members', 'MemberController');
Route::get('inactiveMemebrs', 'MemberController@inActiveUser')->name('members.inactive');
Route::get('actionMemebrs/{id}', 'MemberController@action')->name('members.action');
Route::post('actionMemebrs', 'MemberController@update')->name('members.update');
// ============================History============================
Route::get('fundsHistory', 'HistoryController@addFundsIndex')->name('admin.fundHistory');
Route::get('fundsLoadAjax', 'HistoryController@addFundsAjax')->name('admin.fundHistory.ajax');

Route::get('transactions', 'HistoryController@transaction')->name('admin.transaction');
Route::get('transactionAjax', 'HistoryController@transactionAjax')->name('admin.transaction.ajax');
Route::get('withdrawalHistory', 'HistoryController@withdrawal')->name('admin.withdrawalHistory');
Route::get('withdrawalAjax', 'HistoryController@withdrawalAjax')->name('admin.withdrawalAjax');


});
