<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Generators\UserLocation;
use App\Model\SysDirectoryName;
use App\Model\Restoran;
use App\Model\Generators\UserRestoran;

use App\Model\Generators\PointInArea;
use App\Model\RestoranArea;

class CatalogController extends Controller{
    function getList (Request $request) {
        $location = UserLocation::getLocation();
        if (!$location)
            return redirect()->action('Front\IndexController@getIndex')->with('error', 'Не найден адресс. Повотрите ввод');

        $ar_restoran = $this->getAr();
        $ar_delivery = $this->getArDelivery();
        $ar_delivery_price = $this->getArDeliveryPrice();
        //echo '<pre>'; print_r($ar_delivery_price); echo '</pre>'; exit();

        $items = Restoran::where('id', '>', 0);
        $items = $items->whereIn('id', $ar_restoran);

        if ($request->has('name'))
            $items = $items->where('name', 'like', '%'.$request->input('name').'%');


        if ($request->has('restoran_new')){
            $week_before = date('Y-m-d', time() - (60 * 60 * 24 * 7));
            $items = $items->where('created_at', '>', $week_before);
        }

        $begin_price = false;
        $end_price = false;

        if ($request->has('amount_price')){
            $ar_prices = explode('тг', $request->input('amount_price'));
            if (count($ar_prices) > 2){
                $begin_price = intval($ar_prices[0]);
                $end_price = intval($ar_prices[1]);

                $items = $items->whereHas('relData', function($q) use ($begin_price, $end_price){
                    $q->where('min_price', '>=', $begin_price)->where('min_price', '<=', $end_price);
                });
            }
        }

        if ($request->has('with_sale')){
            $items = $items->whereHas('relSale', function($q){
                $q->where('id', '>', 0);
            });
        }

        if ($request->has('restoran_new_promo'))
            $items = $items->whereHas('relPromo', function($q){
                $q->where('id', '>', 0);
            });

        if ($request->has('restoran_free'))
            $items = $items->whereHas('relData', function($q){
                $q->where('delivery_price', 0);
            });

        if ($request->has('k_name') )
            $items = $items->whereHas('relMenu', function($q) use ($request){
                $q = $q->where('title', 'like', '%'.$request->input('k_name').'%');
            });

        if (count($request->input('kitchen')) > 0){
            $ar_kitchen = $request->input('kitchen');
            $items = $items->whereHas('relKitchens', function($q) use ($ar_kitchen, $request){
                $q = $q->whereIn('kitchen_id', $ar_kitchen);
            });
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
        $ar['ar_delivery'] = $ar_delivery;
        $ar['ar_delivery_price'] = $ar_delivery_price;
        $ar['ar_city'] = SysDirectoryName::where('parent_id', 3)->lists('name', 'id');
        $ar['ar_kitchen'] = SysDirectoryName::where('parent_id', 5)->lists('name', 'id');

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

        $res_restoran = $this->generateAr($location->city_id, array($location->lat, $location->lng));
        if (!$res_restoran)
           return redirect()->action('Front\IndexController@getIndex')->with('error', 'Не найден адресс. Повотрите ввод');

        return redirect()->action('Front\CatalogController@getList');
    }

    function getAddress(){
        return redirect()->action('Front\CatalogController@getList');
    }

    function generateAr($city_id, $ar_coords){
        if (!is_array($ar_coords) || count($ar_coords) != 2)
            return false;

        $pointLocation = new PointInArea();

        $point = implode(" ", $ar_coords);

        $ar_restoran_area = RestoranArea::whereHas('relRestoran', function($q) use ($city_id){
                $q->where('city_id', $city_id);
            })->lists('restoran_id', 'id');

        $items = RestoranArea::whereHas('relRestoran', function($q) use ($city_id){
            $q->where('city_id', $city_id);
        })->get();

        $ar_restoran = array();
        $ar_delivery = array();
        $ar_price_delivery = array();
        foreach ($items as $area_id=>$i) {
            $polygon =  explode(",", $i->find_coords);
            if ($pointLocation->pointInPolygon($point, $polygon)){
                $ar_restoran[] = $ar_restoran_area[$i->id];
                $ar_delivery[$i->restoran_id] = $i->delivery_time;
                $ar_price_delivery[$i->restoran_id] = $i->cost;
            }
        }

        session()->forget('ar_restoran');
        session()->forget('ar_delivery');
        session()->forget('ar_delivery_price');

        foreach ($ar_delivery as $restoran_id => $delivery_time){
            session()->push('ar_delivery.'.$restoran_id, $delivery_time);
        }

        foreach ($ar_price_delivery as $restoran_id => $price){
            session()->push('ar_delivery_price.'.$restoran_id, $price);
        }

        foreach ($ar_restoran as $id){
            session()->push('ar_restoran', $id);
        }

        return true;
    }

     function getAr(){
        if (!session()->has('ar_restoran'))
            return false;

        return session()->get('ar_restoran');
    }

    function getArDelivery(){
        if (!session()->has('ar_delivery'))
            return false;

        return session()->get('ar_delivery');
    }

    function getArDeliveryPrice(){
        if (!session()->has('ar_delivery_price'))
            return false;

        return session()->get('ar_delivery_price');
    }
}
