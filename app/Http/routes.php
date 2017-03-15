<?php


Route::get('/', 'Front\IndexController@getIndex');

// Auth controllers
Route::post('login', 'Auth\AuthController@postLogin');
Route::controller('test', 'TestController');

// Admin Controller
Route::get('adminka', 'Admin\IndexController@getIndex');
