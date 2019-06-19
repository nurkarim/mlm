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
Route::post('discountDelete', 'DiscountConytroller@delete')->name('discounts.delete');
Route::get('checkUserName', 'DiscountConytroller@checkUserName')->name('userName.check');

Route::get('discountPurchaseList', 'DiscountConytroller@indexReg')->name('register.indexReg');
Route::get('requestCodeList', 'DiscountConytroller@requestCodeList')->name('register.requestList');
Route::post('requestCodeList/delete', 'DiscountConytroller@requestCodeDelete')->name('requestCode.delete');


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

Route::get('fundsTransferHistory', 'HistoryController@fundsTransfer')->name('admin.fundsTransfer');
Route::get('fundsTransferHistoryAjax', 'HistoryController@fundsTransferAjax')->name('admin.fundsTransferAjax');

Route::get('earningHistory', 'HistoryController@earningHistory')->name('admin.earningHistory');
Route::get('earningHistoryAjax', 'HistoryController@earningHistoryAjax')->name('admin.earningHistoryAjax');

// ==============================withdrawal=========================================

Route::get('withdrawals/edit/{id}', 'WithdrawalController@edit')->name('withdrawals.edit');
Route::put('withdrawals/update/{id}', 'WithdrawalController@update')->name('withdrawals.update');
Route::get('activeWithdrawal', 'WithdrawalController@activeWithdrawal')->name('withdrawals.active');
Route::get('activeWithdrawalAjax', 'WithdrawalController@activeWithdrawalAjax')->name('withdrawals.activeAjax');
Route::get('inactiveWithdrawal', 'WithdrawalController@inactiveWithdrawal')->name('withdrawals.inactive');
Route::get('inactiveWithdrawalAjax', 'WithdrawalController@inactiveWithdrawalAjax')->name('withdrawals.inactiveAjax');
Route::get('profile', 'AdminController@profile')->name('admin.profile');
Route::post('profile/save', 'AdminController@save')->name('admin.profileUpdate');
Route::get('passwordChange', 'AdminController@passwordChange')->name('admin.passwordChange');
Route::post('passwordChange', 'AdminController@passwordChangeSave')->name('admin.passwordChangeSave');

Route::get('genealogy/{user_name}', 'MemberController@genealogy')->name('admin.genealogy');
Route::get('usersDownload', 'MemberController@export')->name('adminUsers.download');
Route::get('all-users-approved', 'MemberController@updateAll')->name('adminUsers.updateAll');


});
