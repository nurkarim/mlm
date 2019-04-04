<?php

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


});
