<?php

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::group([
    'prefix' => config('site.admin_path'),
    'as' => 'admin.',
    'namespace' => 'Admin',
    'middleware' => 'auth'
], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::post('category/sort', 'CategoryController@sort')->name('category.sort');
    Route::resource('category', 'CategoryController');
});
