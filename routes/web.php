<?php

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::group([
    'prefix' => config('site.admin_path'),
    'as' => 'admin.',
    'namespace' => 'Admin',
    'middleware' => 'auth'
], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
});
