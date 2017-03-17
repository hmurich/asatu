<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class IndexController extends Controller{
    function getIndex (){
        $ar = array();
        $ar['title'] = 'Админка';
        $ar['translator'] = $this->translator;
        
        return view('admin.index.index', $ar);
    }
}
