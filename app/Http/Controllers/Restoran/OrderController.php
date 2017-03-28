<?php
namespace App\Http\Controllers\Restoran;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use App\Model\Restoran;
use App\Model\Order;
use App\Model\Generators\OrderStatus;


class OrderController extends Controller{
    protected $auth;

    function __construct(Guard $auth) {
        $this->auth = $auth;
        parent::__construct();
    }

    function getList (Request $request) {
        $restoran = Restoran::where('user_id', $this->auth->user()->id)->first();
        if (!$restoran)
            abort(404);

        $orders = Order::where('restoran_id', $restoran->id);

        if ($request->has('order_id'))
            $order = Order::where('restoran_id', $restoran->id)->where('id', $request->input('order_id'))->orderBy('id', 'desc')->first();
        else
            $order = Order::where('restoran_id', $restoran->id)->orderBy('id', 'desc')->first();

        if (!$order)
            abort(404);

        $ar = array();
        $ar['title'] = "Заказы";
        $ar['orders'] = $orders->with('relCustomer')->orderBy('id', 'desc')->get();
        $ar['restoran'] = $restoran;
        $ar['order'] = $order;

        $ar['ar_input'] = $request->all();
        $ar['ar_status'] = OrderStatus::getStatusAr();
        $ar['ar_close'] = OrderStatus::getCloseAr();

        $ar['status_open'] = OrderStatus::OPEN;
        $ar['status_accept'] = OrderStatus::ACCEPT;
        $ar['status_missing'] = OrderStatus::MISSING;

        return view('restoran.order.index', $ar);
    }


}
