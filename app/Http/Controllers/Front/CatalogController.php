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
        //$ar_restoran = UserRestoran::getAr();

        $items = Restoran::where('id', '>', 0);
        //$items = $items->whereIn('id', $ar_restoran);
        if ($request->has('name'))
            $items = $items->where('name', 'like', '%'.$request->input('name').'%');

        if ($request->has('kitchen')){
            if ($request->has('restoran_new')){
                $week_before = date('Y-m-d', time() - (60 * 60 * 24 * 7));
                $items = $items->where('created_at', $week_before);
            }

            if ($request->has('restoran_new_promo'))
                $items = $items->whereHas('relPromo', function($q){
                    $q->where('id', '>', 0);
                });
            if ($request->has('restoran_free'))
                $items = $items->whereHas('relData', function($q){
                    $q->where('delivery_price', 0);
                });

            if (count($request->input('kitchen')) > 0){
                $ar_kitchen = $request->input('kitchen');
                $items = $items->whereHas('relMenu', function($q) use ($ar_kitchen, $request){
                    $q = $q->whereIn('cat_id', $ar_kitchen);
                    if ($request->has('k_name'))
                        $q = $q->where('title', 'like', '%'.$name.'%');
                });
            }
        }

        $order_name = 'raiting';
        $order_val = 'desc';
        if ($request->has('sort_name') && $request->has('sort_asc')){
            if ($request->input('sort_name') == 'raiting')
                $order_name = 'raiting';
            else if ($request->input('sort_name') == 'count_view')
                $order_name = 'count_view';
            else if ($request->input('sort_name') == 'price')
                $order_name = 'id';

            if ($request->input('sort_asc') == '1')
                $order_val = 'asc';
        }

        $ar = array();
        $ar['title'] = $this->translator->getTrans('catalog_title');
        $ar['items'] = $items->with('relData')->orderBy($order_name, $order_val)->paginate(24);

        $ar['ar_input'] = $request->all();
        $ar['location'] = $location;
        $ar['ar_city'] = SysDirectoryName::where('parent_id', 3)->lists('name', 'id');
        $ar['ar_kitchen'] = SysDirectoryName::where('parent_id', 5)->lists('name', 'id');

        //echo '<pre>'; print($ar['ar_kitchen']); echo '</pre>'; exit();
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

        //$res_restoran = UserRestoran::generateAr($location->city_id, array($location->lat, $location->lng));
        //if (!$res_restoran)
        //    return redirect()->action('Front\IndexController@getIndex')->with('error', 'Не найден адресс. Повотрите ввод');

        return redirect()->action('Front\CatalogController@getList');
    }

    function getAddress(){
        return redirect()->action('Front\CatalogController@getList');
    }
}
