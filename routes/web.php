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

    Route::resource('category', 'CategoryController');
    Route::post('category/sort', 'CategoryController@sort')->name('category.sort');
    Route::resource('article', 'ArticleController');
    Route::resource('notice', 'NoticeController');

    Route::get('setting', 'SettingController@edit')->name('setting.edit');
    Route::post('setting', 'SettingController@update')->name('setting.update');
});


Route::get('/', 'HomeController@index');
