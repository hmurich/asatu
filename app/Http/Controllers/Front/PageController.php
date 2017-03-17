<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Model\Page;
use App\Model\StaticPage;

class PageController extends Controller{
    function getShowPage ($alias){
        $item = Page::where('alias', $alias)->first();
        if (!$item)
            abort(404);

        $ar = array();
        $ar['title'] = $item->title_trans;
        $ar['el'] = $item;

        return view('front.page.dinamic', $ar);
    }

    function getShowStatPage ($alias){
        $item = StaticPage::where('sys_key', $alias)->first();
        if (!$item)
            abort(404);

        $ar = array();
        $ar['title'] = $item->title_trans;
        $ar['el'] = $item;

        return view('front.page.static', $ar);
    }
}
