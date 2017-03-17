<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Model\SysDirectoryName;
use App\Model\Page;
use App\Model\StaticPage;

class IndexController extends Controller{
    function getIndex (){
        $ar = array();
        $ar['title'] = $this->translator->getTrans('main_title');
        $ar['ar_city'] = SysDirectoryName::where('parent_id', 3)->lists('name', 'id');
        $ar['help_article'] = Page::where('type_id', 11)->orderBy('id', 'desc')->take(3)->get();
        $ar['news'] = Page::where('type_id', 12)->orderBy('id', 'desc')->take(3)->get();
        $ar['about'] = StaticPage::where('sys_key', 'about')->first();

        //echo '<pre>'; print_r($ar['ar_city']); echo '</pre>'; exit();

        return view('front.index.index', $ar);
    }
}
