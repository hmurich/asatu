<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Generators\UserLocation;
use App\Model\SysDirectoryName;
use App\Model\Restoran;
use App\Model\Generators\UserRestoran;

class CatalogController extends Controller{
    function getList (Request $request) {
        $location = UserLocation::getLocation();
        if (!$location)
            return redirect()->action('Front\IndexController@getIndex')->with('error', 'Не найден адресс. Повотрите ввод');
        $ar_restoran = UserRestoran::getAr();

        $items = Restoran::where('id', '>', 0);
        $items = $items->whereIn('id', $ar_restoran);
        if ($request->has('name'))
            $items = $items->where('name', 'like', '%'.$request->input('name').'%');

        $ar = array();
        $ar['title'] = $this->translator->getTrans('catalog_title');
        $ar['items'] = $items->with('relData')->orderBy('raiting', 'desc')->paginate(24);

        $ar['ar_input'] = $request->all();
        $ar['location'] = $location;
        $ar['ar_city'] = SysDirectoryName::where('parent_id', 3)->lists('name', 'id');

        return view('front.catalog.index', $ar);
    }

    function postAddress(Request $request){
        $city_id = $request->input('city_id');
        $ar_city = SysDirectoryName::where('parent_id', 3)->lists('name', 'id');

        if (!isset($ar_city[$city_id]) || !$request->has('city_id')
            || !$request->has('address') || !$request->input('address')
            || !$request->has('lat') || !$request->has('lng'))
            return redirect()->action('Front\IndexController@getIndex')->with('error', 'Не найден адресс. Повотрите ввод');

        $coords = array();
        $coords['lng'] = $request->input('lng');
        $coords['lat'] = $request->input('lat');

        $location = UserLocation::setLocation($city_id, $request->input('address'), $coords);
        if (!$location)
            return redirect()->action('Front\IndexController@getIndex')->with('error', 'Не найден адресс. Повотрите ввод');

        $res_restoran = UserRestoran::generateAr($location->city_id, array($location->lat, $location->lng));
        if (!$res_restoran)
            return redirect()->action('Front\IndexController@getIndex')->with('error', 'Не найден адресс. Повотрите ввод');

        return redirect()->action('Front\CatalogController@getList');
    }

    function getAddress(){
        return redirect()->action('Front\CatalogController@getList');
    }
}
