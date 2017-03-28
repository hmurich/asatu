<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Generators\OrderBusket;
use App\Model\Generators\UserLocation;
use App\Model\Restoran;
use App\Model\Menu;
use Auth;
use App\User;
use App\Model\Customer;
use App\Model\Order;
use App\Model\OrderItem;
use Hash;
use DB;

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

        $user = Auth::user();
        if (!$user){
            $password = rand(100000, 999999);

            $user = new User();
            $user->email = $request->input('email');
            $user->password = Hash::make($password);
            $user->type_id = 4;
            $user->save();

            $user->sendPasswordToEmail($password);

            $customer = new Customer();
            $customer->user_id = $user->id;
            $customer->save();
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

        $order = new note


        DB::commit();

        echo '<pre>'; print_r($request->all()); echo '</pre>';
    }
}
