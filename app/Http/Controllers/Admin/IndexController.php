<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class IndexController extends Controller{
    function getIndex (){
        return redirect()->action('Admin\SiteSettingController@getIndex');

        $ar = array();
        $ar['title'] = 'Админка';

        return view('admin.index.index', $ar);
    }
}
