<?php
namespace App\Http\Controllers\Front\Restoran;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Generators\UserLocation;
use App\Model\Generators\OrderBusket;
use App\Model\SysDirectoryName;
use App\Model\Restoran;
use App\Model\Menu;
use App\Model\Sale;

class MenuController extends Controller{
    function getList (Request $request, $restoran_id) {
        $location = UserLocation::getLocation();
        if (!$location)
            return redirect()->action('Front\IndexController@getIndex')->with('error', 'Не найден адресс. Повотрите ввод');

        $restoran = Restoran::findOrFail($restoran_id);
        $restoran->count_view++;
        $restoran->save();

        $items = Menu::where('restoran_id', $restoran->id)->where('is_active', 1);

        if ($request->has('kitchen') && count($request->input('kitchen')))
            $items = $items->whereIn('cat_id', $request->input('kitchen'));

        if ($request->has('k_name') && $request->input('k_name'))
            $items = $items->where('title', 'like', '%'.$request->input('k_name').'%');

        $sale = Sale::where('restoran_id', $restoran->id)->orderBy('id', 'desc')->first();

        $ar = array();
        $ar['title'] = $restoran->name;
        $ar['restoran'] = $restoran;
        $ar['location'] = $location;
        $ar['items'] = $items->orderBy('cat_id', 'desc')->paginate(24);
        $ar['sale'] = $sale;

        $ar['ar_input'] = $request->all();
        $ar['location'] = $location;
        $ar['ar_city'] = SysDirectoryName::where('parent_id', 3)->lists('name', 'id');
        $ar['ar_kitchen'] = SysDirectoryName::where('parent_id', 4)->lists('name', 'id');
        $ar['ar_menu_type'] = SysDirectoryName::where('parent_id', 4)->lists('name', 'id');
        $ar['ar_menu'] = Menu::where('restoran_id', $restoran->id)->lists('title', 'id');
        $ar['busket'] = OrderBusket::getOrder($restoran->id);
        $ar['ar_delivery'] = $this->getArDelivery();

        $ar['ar_menu_cat'] = Menu::where('restoran_id', $restoran->id)->select('cat_id', 'id')->get()->keyBy('id')->toArray();
        //echo '<pre>'; print_r($ar['ar_menu_cat']); echo '</pre>'; exit();


        return view('front.restoran.menu', $ar);
    }

    function postOrder(Request $request){
        if (!$request->has('restoran_id') || !$request->has('menu_id') || !$request->has('count') || !$request->has('cost'))
            return 'none';

        $restoran_id = $request->input('restoran_id');

        $ar_menu = array();
        $ar_menu['menu_id'] = $request->input('menu_id');
        $ar_menu['count'] = $request->input('count');
        $ar_menu['cost'] = $request->input('cost');

        $order = new OrderBusket($restoran_id, $ar_menu);

        if (!$order)
            return 'none';

        return $order->total_cost;
    }

    function getArDelivery(){
        if (!session()->has('ar_delivery'))
            return false;

        return session()->get('ar_delivery');
    }

}
