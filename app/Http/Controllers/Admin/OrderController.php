<?php
namespace App\Http\Controllers\Admin;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Restoran;
use App\Model\Order;
use App\Model\Generators\OrderStatus;
use App\Model\SysDirectoryName;

class OrderController extends Controller{
    function getList (Request $request){
        $orders = Order::where('id', '>', 0);

        if (($request->has('filter.city_id') && $request->input('filter.city_id')) || ($request->has('filter.r_name')))
            $orders = $orders->whereHas('relRestoran', function($q) use ($request) {
                if ($request->has('filter.city_id') && $request->input('filter.city_id'))
                    $q = $q->where('city_id', $request->input('filter.city_id'));
                if ($request->has('filter.r_name'))
                    $q = $q->where('name', 'like', '%'.$request->input('filter.r_name').'%');
            });

        if ($request->has('filter.status_id') && $request->input('filter.status_id'))
            $orders = $orders->where('status_id', $request->input('filter.status_id'));

        if ($request->has('filter.customer_name'))
            $orders = $orders->whereHas('relCustomer', function($q) use ($request){
                $q->where('name', 'like', '%'.$request->input('filter.customer_name').'%');
            });



        $ar = array();
        $ar['title'] = "Заказы";
        $ar['orders'] = $orders->with('relCustomer', 'relRestoran')->orderBy('id', 'desc')->paginate(24);

        $ar['ar_input'] = $request->all();
        $ar['ar_status'] = OrderStatus::getStatusAr();
        $ar['ar_city'] = SysDirectoryName::where('parent_id', 3)->lists('name', 'id');

        $ar['status_missing_id'] = OrderStatus::MISSING;

        return view('admin.order.index', $ar);
    }


    function getItem(Request $request, $order_id){
        $order = Order::findOrFail($order_id);

        $ar = array();
        $ar['title'] = "Заказ";
        $ar['order'] = $order;

        $ar['ar_input'] = $request->all();
        $ar['ar_status'] = OrderStatus::getStatusAr();
        $ar['ar_city'] = SysDirectoryName::where('parent_id', 3)->lists('name', 'id');

        $ar['status_missing_id'] = OrderStatus::MISSING;

        return view('admin.order.item', $ar);
    }

    function getMissingOrder(Request $request, $order_id){
        $order = Order::findOrFail($order_id);
        $order->status_id = OrderStatus::MISSING;
        $order->save();

        return redirect()->back()->with('success', 'Сохранено');
    }

    function getCloseOrder (Request $request, $order_id){
        $order = Order::findOrFail($order_id);
        $order->status_id = OrderStatus::CLOSE;
        $order->save();

        return redirect()->back()->with('success', 'Сохранено');
    }

}
