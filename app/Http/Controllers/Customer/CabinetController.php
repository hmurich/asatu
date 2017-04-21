<?php
namespace App\Http\Controllers\Customer;

use Auth;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use App\Model\Customer;
use App\Model\Generators\OrderStatus;
use App\Model\SysDirectoryName;
use App\Model\Order;
use App\Model\Restoran;
use App\Model\Review;

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

    function getReview(Request $request, $restoran_id){
        $restoran = Restoran::findOrFail($restoran_id);

        $ar = array();
        $ar['title'] = "Личный кабинет";
        $ar['action'] = action('Customer\CabinetController@postReview', $restoran->id);

        return view('customer.review', $ar);
    }

    function postReview(Request $request, $restoran_id){
        $restoran = Restoran::findOrFail($restoran_id);
        $customer = Customer::where('user_id', $this->auth->user()->id)->first();
        if (!$customer)
            abort(404);

        DB::beginTransaction();

        $item = new Review();
        $item->user_id = $customer->user_id;
        $item->parent_id = 0;
        $item->restoran_id = $restoran->id;
        $item->raiting = $request->input('raiting');
        $item->name = $customer->name;
        $item->note = $request->input('note');
        $item->save();

        $raiting = $restoran->relReiting;
        $raiting->vote_count = $raiting->vote_count + 1;
        $raiting->vote_sum = $raiting->vote_sum + $item->raiting;
        $raiting->vote_avg = $raiting->vote_sum/$raiting->vote_count;
        $raiting->save();

        $restoran->raiting = round($raiting->vote_avg, 2);
        $restoran->save();

        DB::commit();

        return redirect()->action('Customer\CabinetController@getCabinet')->with('success', 'Сохранено');
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
