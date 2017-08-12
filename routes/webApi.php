<?php

Route::group(['middleware' => 'auth'], function () {
    Route::get('category', 'CategoryController@index');
    Route::post('article', 'ArticleController@store');
});
