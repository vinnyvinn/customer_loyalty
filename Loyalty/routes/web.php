<?php

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('customers', 'CustomerController');
Route::get('loyaltycustomers', 'LoyaltyPointController@loyaltycustomers');
Route::post('loyaltycustomers', 'LoyaltyPointController@customers');
Route::post('/policies/save', 'PolicyController@fetchPolicy');
Route::resource('policies', 'PolicyController');
Route::resource('loyaltypoints', 'LoyaltyPointController');
Route::get('/reports/highest-point-holders', 'ReportController@index')->name('highest-point-holders');
Route::get('/reports/highest', 'ReportController@highest')->name('print-highest');
Route::get('/reports/accumulated-points', 'ReportController@accumulate')->name('accumulated-points');
Route::get('/reports/print-accumulated', 'ReportController@accumulated');
Route::get('/reports/points-redeemed', 'ReportController@redeemed')->name('points-redeemed');
Route::get('/reports/print-redeemed', 'ReportController@redeem')->name('redeem');
Route::get('/reports/disenrolled', 'ReportController@disenrolled')->name('disenrolled');
