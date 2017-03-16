<?php


Route::get('/', 'Front\IndexController@getIndex');

// Auth controllers
Route::post('login', 'Auth\AuthController@postLogin');
Route::controller('test', 'TestController');

// Admin Controllers
Route::group(['middleware' => ['auth.admin']], function () {
    Route::get('adminka', 'Admin\IndexController@getIndex');
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
