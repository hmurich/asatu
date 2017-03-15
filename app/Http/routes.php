<?php

Route::get('/', 'Front\IndexController@getIndex');


Route::controller('test', 'TestController');
