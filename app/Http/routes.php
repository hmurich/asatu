<?php
Route::get('/', function () {
    echo 'hello';
    return view('welcome');
});

Route::get('/', 'Front\IndexController@getIndex');
