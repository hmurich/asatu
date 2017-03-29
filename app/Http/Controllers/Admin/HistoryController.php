<?php
namespace App\Http\Controllers\Admin;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Restoran;
use App\Model\Order;
use App\Model\Generators\OrderStatus;
use App\Model\SysDirectoryName;

class HistoryController extends Controller{
    function getList (Request $request){
        $orders = Order::where('id', '>', 0);

        $ar = array();
        $ar['title'] = "Заказы";
        $ar['orders'] = $orders->with('relCustomer')->orderBy('id', 'desc')->get();
        $ar['restoran'] = $restoran;

        $ar['ar_input'] = $request->all();
        $ar['ar_status'] = OrderStatus::getStatusAr();
        $ar['ar_city'] = SysDirectoryName::where('parent_id', 3)->lists('name', 'id');

        return view('admin.history.index', $ar);
    }

}
