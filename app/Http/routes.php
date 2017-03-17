<?php


Route::get('/', 'Front\IndexController@getIndex');

// Auth controllers
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

// Admin Controllers
Route::group(['middleware' => ['auth.admin']], function () {
    Route::get('adminka', 'Admin\IndexController@getIndex');
    Route::controller('adminka/moderator', 'Admin\ModeratorController');
    Route::controller('adminka/static-page', 'Admin\StaticPageController');
    Route::controller('adminka/page', 'Admin\PageController');
    Route::controller('adminka/site-setting', 'Admin\SiteSettingController');
    Route::controller('adminka/translator', 'Admin\TranslateController');
});

// Moderator Controllers
Route::group(['middleware' => ['auth.moderator']], function () {

});

// Restoran Controllers
Route::group(['middleware' => ['auth.restoran']], function () {

});

// Customer Controllers
Route::group(['middleware' => ['auth.customer']], function () {

});

// Test Controllers
Route::controller('test', 'TestController');
