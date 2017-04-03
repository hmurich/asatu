<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Generators\OrderBusket;
use App\Model\Generators\UserLocation;
use App\Model\Generators\OrderStatus;
use App\Model\Restoran;
use App\Model\Menu;
use Auth;
use App\User;
use App\Model\Customer;
use App\Model\Order;
use App\Model\OrderItem;
use Hash;
use DB;
use App\Model\Promo;

class OrderController extends Controller{
    function getForm (Request $request, $restoran_id){
        $location = UserLocation::getLocation();
        if (!$location)
            return redirect()->action('Front\IndexController@getIndex')->with('error', 'Не найден адресс. Повотрите ввод');
        $restoran = Restoran::findOrFail($restoran_id);

        $user = Auth::user();
        if ($user)
            $customer = $user->relCustomer;
        else
            $customer = false;

        $busket = OrderBusket::getOrder($restoran->id);
        if (empty($busket) || count($busket) < 2)
            return redirect()->action('Front\Restoran\MenuController@getList', $restoran->id);

        $ar_busket_menu = array_keys($busket);

        $ar = array();
        $ar['title'] = 'Форма заказа';
        $ar['restoran'] = $restoran;
        $ar['menu'] = Menu::where('restoran_id', $restoran->id)->whereIn('id', $ar_busket_menu)->orderBy('id', 'desc')->get();
        $ar['busket'] = $busket;
        $ar['user'] = $user;
        $ar['customer'] = $customer;

        return view('front.order.index', $ar);
    }

    function postForm (Request $request, $restoran_id){
        $location = UserLocation::getLocation();
        if (!$location)
            return redirect()->action('Front\IndexController@getIndex')->with('error', 'Не найден адресс. Повотрите ввод');
        $restoran = Restoran::findOrFail($restoran_id);

        DB::beginTransaction();
        $busket = OrderBusket::getOrder($restoran->id);

        $user = Auth::user();
        if (!$user){
            $password = rand(100000, 999999);

            if (User::where('email', $request->input('email'))->count() > 0)
                return back()->with('error', 'Почтовый адрес уже зарегистрирован');

            $user = new User();
            $user->email = $request->input('email');
            $user->password = Hash::make($password);
            $user->type_id = 4;
            $user->save();

            $user->sendPasswordToEmail($password);

            $customer = new Customer();
            $customer->user_id = $user->id;
            $customer->save();

            Auth::loginUsingId($user->id);
        }
        else
            $customer = Customer::where('user_id', $user->id)->first();

        if (!$customer){
            DB::rollback();
            abort(404);
        }

        $customer->name = $request->input('name');
        $customer->phone = $request->input('phone');
        $customer->address = $request->input('address');
        $customer->kvartira = $request->input('kvartira');
        $customer->podezd = $request->input('podezd');
        $customer->etag = $request->input('etag');
        $customer->domofon = $request->input('domofon');
        $customer->count_person = $request->input('count_person');
        $customer->save();

        $order = new Order();
        $order->customer_id = $customer->id;
        $order->restoran_id = $restoran->id;
        $order->status_id = OrderStatus::OPEN;
        $order->total_sum = $busket['total_cost'];
        if ($request->has('promo_key')){
            $promo = Promo::getPromoSum($restoran->id, $request->input('promo_key'), $order->total_sum);
            if (!($promo === false)){
                $order->promo_key = $request->input('promo_key');
                $order->sum_without_sale = $order->total_sum;
                $order->total_sum = $promo;
            }
        }

        $order->count_person = $customer->count_person;
        $order->note = $request->input('note');
        $order->save();

        foreach ($busket as $meni_id=>$ar_menu){
            if ($meni_id == 'total_cost' || !isset($ar_menu['count']) || !isset($ar_menu['cost']))
                continue;

            $order_item = new OrderItem();
            $order_item->order_id = $order->id;
            $order_item->menu_id = $meni_id;
            $order_item->count_item = $ar_menu['count'];
            $order_item->cost_item = $ar_menu['cost'];
            $order_item->cost_total = $ar_menu['cost'] * $ar_menu['count'];
            $order_item->save();
        }
        DB::commit();

        OrderBusket::forgetOrder($restoran->id);

        return redirect()->action('Customer\CabinetController@getCabinet')->with('success', 'Заказ принят');
    }

    function postPromo(Request $request){
        if (!$request->has('restoran_id') || !$request->has('promo_key') || !$request->has('sum'))
            return 'none';

        $promo = Promo::getPromoSum($request->input('restoran_id'), $request->input('promo_key'), $request->input('sum'));

        if ($promo === false)
            return 'none';

        return $promo;
    }
}
