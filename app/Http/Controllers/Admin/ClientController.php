<?php
namespace App\Http\Controllers\Admin;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Customer;
use App\User;

class ClientController extends Controller{
    function getList (Request $request){
        $items = Promo::where('id', '>', 0);

        $ar = array();
        $ar['title'] = 'Промокоды';
        $ar['ar_input'] = $request->all();
        $ar['items'] = $items->orderBy('id', 'desc')->paginate(25);
        $ar['ar_restoran'] = Restoran::orderBy('name', 'asc')->lists('name', 'id');

        $ar['ar_boolean'] = array(0=>'Нет', 1=>'Да');

        return view('admin.promo.index', $ar);
    }

    function getItem(Request $request, $promo_id = 0){
        $promo = Promo::find($promo_id);

        $ar = array();
        if (!$promo){
            $ar['title'] = 'Создать промокод';
            $ar['action'] = action('Admin\PromoController@postItem');
            $ar['item'] = false;
        }
        else {
            $ar['title'] = 'Редактировать промокод';
            $ar['action'] = action('Admin\PromoController@postItem', $promo->id);
            $ar['item'] = $promo;
        }

        $ar['ar_restoran'] = Restoran::orderBy('name', 'asc')->lists('name', 'id');
        $ar['ar_boolean'] = array(0=>'Нет', 1=>'Да');

        return view('admin.promo.item', $ar);
    }

    function postItem(Request $request, $promo_id = 0){
        if (Promo::where('promo_key', $request->input('promo_key'))->where('id', '<>', $promo_id)->count() > 0)
            return redirect()->back()->with('error', 'Промокод уже есть');

        $promo = Promo::find($promo_id);
        if (!$promo)
            $promo = new Promo();

        $promo->active = $request->input('active');
        $promo->to_all = ($request->input('restoran_id') ? 0 : 1);
        $promo->restoran_id = $request->input('restoran_id');
        $promo->is_percent = $request->input('is_percent');
        $promo->count_sale = $request->input('count_sale');
        $promo->promo_key = $request->input('promo_key');
        $promo->count_use = $request->input('count_use');
        $promo->count_total_use = 0;

        $promo->save();

        return redirect()->action('Admin\PromoController@getList')->with('success', 'сохранено');
    }


}
