<?php
namespace App\Http\Controllers\Restoran;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Generators\UserLocation;

class OrderController extends Controller{
    function getList (Request $request) {
        $location = UserLocation::getLocation();
        if (!$location)
            return redirect()->action('Front\IndexController@getIndex')->with('error', 'Не найден адресс. Повотрите ввод');

        $items = Restoran::where('id', '>', 0);
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

        if (!isset($ar_city[$city_id]) || !$request->has('city_id') || !$request->has('address') || !$request->input('address'))
            return redirect()->action('Front\IndexController@getIndex')->with('error', 'Не найден адресс. Повотрите ввод');

        $location = UserLocation::setLocation($city_id, $request->input('address'));
        if (!$location)
            return redirect()->action('Front\IndexController@getIndex')->with('error', 'Не найден адресс. Повотрите ввод');

        return redirect()->action('Front\CatalogController@getList');
    }

    function getAddress(){
        return redirect()->action('Front\CatalogController@getList');
    }
}
