<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Generators\OrderBusket;
use App\Model\Generators\UserLocation;
use App\Model\Restoran;

class OrderController extends Controller{
    function getForm (Request $request, $restoran_id){
        $location = UserLocation::getLocation();
        if (!$location)
            return redirect()->action('Front\IndexController@getIndex')->with('error', 'Не найден адресс. Повотрите ввод');
        $restoran = Restoran::findOrFail($restoran_id);

        echo 'asdfsfd'; exit();

        $item = OrderBusket::where('alias', $alias)->first();
        if (!$item)
            abort(404);

        $ar = array();
        $ar['title'] = $item->title_trans;
        $ar['el'] = $item;

        return view('front.order.index', $ar);
    }

    function postForm (Request $request){

    }
}
