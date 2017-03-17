<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class IndexController extends Controller{
    function getIndex (){
        $ar = array();
        $ar['title'] = 'Админка';
        $ar['ar_city'] = SysDirectoryName::where('parent_id', 3)->lists('name', 'id');

        echo '<pre>'; print_r($ar['ar_city']); echo '</pre>'; exit();

        return view('admin.index.index', $ar);
    }
}
