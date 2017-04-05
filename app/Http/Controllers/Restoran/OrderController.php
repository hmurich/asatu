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
        $ar['status_cancel'] = OrderStatus::CANCEL;
        $ar['status_close'] = OrderStatus::CLOSE;
        $ar['status_missing'] = OrderStatus::MISSING;

        $ar['ar_close_ar'] = OrderStatus::getCloseAr();

        return view('restoran.order.index', $ar);
    }

    function getChangeStatus(Request $request, $order_id, $status_id, $pod_status_id = 0){
        $restoran = Restoran::where('user_id', $this->auth->user()->id)->first();
        if (!$restoran)
            abort(404);

        $order = Order::where('restoran_id', $restoran->id)->where('id', $order_id)->orderBy('id', 'desc')->first();
        if (!$order)
            abort(404);

        $order->status_id = $status_id;
        $order->close_status_id = $pod_status_id;
        $order->save();

        return redirect()->back()->with('success', 'Сохранено');
    }

}
