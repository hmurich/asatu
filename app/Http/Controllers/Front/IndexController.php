<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Model\SysDirectoryName;
use App\Model\Page;
use App\Model\StaticPage;
use App\Model\Generators\GeoLocator;
use Illuminate\Http\Request;

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

    function postGeoCoder(Request $request){
        if (!$request->has('name') || !$request->has('city_id'))
            return '0';

        $city = SysDirectoryName::find($request->input('city_id'));
        if (!$city)
            return '0';

        $query = 'Казахстан, '.$city->name.', '.$request->input('name');

        $api = new GeoLocator();
        $api->setQuery($query);
        $api->load();

        $response = $api->getResponse();
        $collection = $response->getList();

        $ar = array();
        foreach ($collection as $item) {
            $ar['value'] = $item->getAddress();
            $ar['label'] = $item->getAddress();
            $ar['lat'] = $item->getLatitude();
            $ar['lng'] = $item->getLongitude();
        }

        echo json_encode($ar);
    }
}
