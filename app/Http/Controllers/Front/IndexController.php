<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Model\SysDirectoryName;
use App\Model\Page;
use App\Model\StaticPage;
use App\Model\Generators\GeoLocator;
use Illuminate\Http\Request;
use App\Model\RegistrRestoran;

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

        $query = $city->name.', '.$request->input('name');

        $api = new GeoLocator();
        $api->setQuery($query);
        $api->load();

        $response = $api->getResponse();
        $collection = $response->getList();

        $ar = array();

        foreach ($collection as $item) {
            $i = array();
            $i['value'] = $item->getLatitude().' '.$item->getLongitude();
            $address = $item->getAddress();
            $address = explode(",", $address);
            if (isset($address[0]))
                unset($address[0]);
            if (isset($address[1]) && count($address) > 1)
                unset($address[1]);
            $address = implode(',', $address);

            $i['label'] = $address;

            $ar[] = $i;
        }

        echo json_encode($ar);
    }

    function postRegistrRestoran(Request $request){
        $item = new RegistrRestoran();
        $item->name = $request->input('name');
        $item->city = $request->input('city');
        $item->fio = $request->input('fio');
        $item->phone = $request->input('phone');
        $item->email = $request->input('email');
        $item->save();

        return redirect()->back()->with('success', 'Ваша заявка была принята');
    }
}
