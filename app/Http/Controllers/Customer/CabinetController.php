<?php
namespace App\Http\Controllers\Customer;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use App\Model\Customer;
use App\Model\Generators\OrderStatus;
use App\Model\SysDirectoryName;
use App\Model\Order;

class CabinetController extends Controller {
    protected $auth;

    function __construct(Guard $auth) {
        $this->auth = $auth;
        parent::__construct();
    }

    function getCabinet(Request $request){
        $customer = Customer::where('user_id', $this->auth->user()->id)->first();
        if (!$customer)
            abort(404);

        $orders = Order::where('customer_id', $customer->id);

        $ar = array();
        $ar['title'] = "Личный кабинет";
        $ar['orders'] = $orders->with('relCustomer', 'relRestoran')->orderBy('id', 'desc')->paginate(24);
        $ar['customer'] = $customer;

        $ar['ar_input'] = $request->all();
        $ar['ar_status'] = OrderStatus::getStatusAr();
        $ar['ar_city'] = SysDirectoryName::where('parent_id', 3)->lists('name', 'id');

        return view('customer.index', $ar);
    }

    function getEdit(Request $request){
        $customer = Customer::where('user_id', $this->auth->user()->id)->first();
        if (!$customer)
            abort(404);

        $ar = array();
        $ar['title'] = "Личный кабинет";
        $ar['customer'] = $customer;

        $ar['ar_input'] = $request->all();
        $ar['ar_status'] = OrderStatus::getStatusAr();
        $ar['ar_city'] = SysDirectoryName::where('parent_id', 3)->lists('name', 'id');

        return view('customer.edit', $ar);
    }

    function postEdit(Request $request){
        $customer = Customer::where('user_id', $this->auth->user()->id)->first();
        if (!$customer)
            abort(404);

        $customer->name	= $request->input('name');
        $customer->phone = $request->input('phone');
        $customer->address = $request->input('address');
        $customer->kvartira	= $request->input('kvartira');
        $customer->podezd = $request->input('podezd');
        $customer->etag	= $request->input('etag');
        $customer->domofon = $request->input('domofon');
        $customer->save();

        return redirect()->action('Customer\CabinetController@getCabinet')->with('success', 'Сохранено');
    }

}
