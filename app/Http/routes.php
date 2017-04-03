<?php
App\Model\Generators\CloseOrderTime::checkOld();
Route::get('check_old', function(){
    App\Model\Generators\CloseOrderTime::checkOld();
});

Route::get('/', 'Front\IndexController@getIndex');
Route::get('/show/{name}', 'Front\PageController@getShowPage');
Route::get('/page/{name}', 'Front\PageController@getShowStatPage');
Route::controller('catalog', 'Front\CatalogController');
Route::controller('order', 'Front\OrderController');
Route::controller('restoran/menu', 'Front\Restoran\MenuController');
Route::controller('restoran/review', 'Front\Restoran\ReviewController');
Route::post('geocoder', 'Front\IndexController@postGeoCoder');
Route::post('registr-restoran', 'Front\IndexController@postRegistrRestoran');

// Auth controllers
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');
Route::post('forgot-pass', 'Auth\AuthController@postForgotPass');
Route::get('forgot-pass', 'Auth\AuthController@getForgotPass');

// Admin Controllers
Route::group(['middleware' => ['auth.admin']], function () {
    Route::get('adminka', 'Admin\IndexController@getIndex');

    Route::controller('adminka/moderator', 'Admin\ModeratorController');
    Route::controller('adminka/static-page', 'Admin\StaticPageController');
    Route::controller('adminka/page', 'Admin\PageController');
    Route::controller('adminka/site-setting', 'Admin\SiteSettingController');
    Route::controller('adminka/translator', 'Admin\TranslateController');
    Route::controller('adminka/city', 'Admin\CityController');
    Route::controller('adminka/kitchen', 'Admin\KitchenController');
    Route::controller('adminka/menu-type', 'Admin\MenuTypeController');
});

// Moderator Controllers
Route::group(['middleware' => ['auth.moderator']], function () {
    Route::controller('moderator', 'Moderator\CabinetController');

    Route::controller('adminka/restoran-edit', 'Admin\Restoran\EditController');
    Route::controller('adminka/menu', 'Admin\Restoran\MenuController');
    Route::controller('adminka/location', 'Admin\Restoran\LocationController');
    Route::controller('adminka/review', 'Admin\Restoran\ReviewController');
    Route::controller('adminka/area', 'Admin\Restoran\AreaController');

    Route::controller('adminka/order', 'Admin\OrderController');
    Route::controller('adminka/restoran', 'Admin\RestoranController');
    Route::controller('adminka/promo', 'Admin\PromoController');
    Route::controller('adminka/history', 'Admin\HistoryController');
    Route::controller('adminka/client', 'Admin\ClientController');
    Route::controller('adminka/registr-restoran', 'Admin\RegistrRestoranController');

});

// Restoran Controllers
Route::group(['middleware' => ['auth.restoran']], function () {
    Route::controller('cabinet/order', 'Restoran\OrderController');
    Route::controller('cabinet/review', 'Restoran\ReviewController');
    Route::controller('cabinet/menu', 'Restoran\MenuController');
    Route::controller('cabinet/info', 'Restoran\RestoranController');
    Route::controller('cabinet/history', 'Restoran\HistoryController');

});

// Customer Controllers
Route::group(['middleware' => ['auth.customer']], function () {
    Route::controller('customer/cabinet', 'Customer\CabinetController');
});

// Change lang routes
Route::get('ru', function(){
    $translator = new App\Model\Generators\Translator();
    $translator->setSessionLangId('ru');

    return redirect()->back();
});

Route::get('kz', function(){
    $translator = new App\Model\Generators\Translator();
    $translator->setSessionLangId('kz');

    return redirect()->back();
});

Route::get('en', function(){
    $translator = new App\Model\Generators\Translator();
    $translator->setSessionLangId('en');

    return redirect()->back();
});


// Test Controllers
Route::controller('test', 'TestController');
