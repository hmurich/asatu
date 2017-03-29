<?php
namespace App\Http\Controllers\Customer;

use Auth;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Auth\Guard;
use App\Model\Customer;
use App\Model\Generators\OrderStatus;
use App\Model\SysDirectoryName;

class CabinetController extends Controller {
    protected $auth;

    function __construct(Guard $auth) {
        $this->auth = $auth;
        parent::__construct();
    }

    function getCabinet(){
        $customer = Customer::where('user_id', $this->auth->user()->id)->first();
        if (!$customer)
            abort(404);

        $orders = Order::where('restoran_id', $restoran->id);

        $ar = array();
        $ar['title'] = "Личный кабинет";
        $ar['orders'] = $orders->with('relCustomer', 'relRestoran')->orderBy('id', 'desc')->paginate(24);
        $ar['customer'] = $customer;

        $ar['ar_input'] = $request->all();
        $ar['ar_status'] = OrderStatus::getStatusAr();
        $ar['ar_city'] = SysDirectoryName::where('parent_id', 3)->lists('name', 'id');

        return view('customer.index', $ar);
    }

    function getEdit(){

    }

    function postEdit(){

    }

}
