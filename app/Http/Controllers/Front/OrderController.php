<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Generators\OrderBusket;
use App\Model\Generators\UserLocation;
use App\Model\Restoran;
use App\Model\Menu;

class OrderController extends Controller{
    function getForm (Request $request, $restoran_id){
        $location = UserLocation::getLocation();
        if (!$location)
            return redirect()->action('Front\IndexController@getIndex')->with('error', 'Не найден адресс. Повотрите ввод');
        $restoran = Restoran::findOrFail($restoran_id);

        $busket = OrderBusket::getOrder($restoran->id);
        $ar_busket_menu = array_keys($busket);

        $ar = array();
        $ar['title'] = 'Форма заказа';
        $ar['restoran'] = $restoran;
        $ar['menu'] = Menu::where('restoran_id', $restoran->id)->whereIn('id', $ar_busket_menu)->orderBy('id', 'desc')->get();
        $ar['busket'] = $busket;

        return view('front.order.index', $ar);
    }

    function postForm (Request $request, $restoran_id){
        $location = UserLocation::getLocation();
        if (!$location)
            return redirect()->action('Front\IndexController@getIndex')->with('error', 'Не найден адресс. Повотрите ввод');
        $restoran = Restoran::findOrFail($restoran_id);
        
        echo '<pre>'; print_r($request->all()); echo '</pre>';
    }
}
