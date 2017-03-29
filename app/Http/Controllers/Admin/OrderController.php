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

        $ar = array();
        $ar['title'] = "Заказы";
        $ar['orders'] = $orders->with('relCustomer', 'relRestoran')->orderBy('id', 'desc')->get();

        $ar['ar_input'] = $request->all();
        $ar['ar_status'] = OrderStatus::getStatusAr();
        $ar['ar_city'] = SysDirectoryName::where('parent_id', 3)->lists('name', 'id');

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

        return view('admin.order.item', $ar);
    }

}
