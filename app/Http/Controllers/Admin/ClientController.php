<?php
namespace App\Http\Controllers\Admin;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Customer;
use App\User;

class ClientController extends Controller{
    function getList (Request $request){
        $items = Customer::where('id', '>', 0);

        $ar = array();
        $ar['title'] = 'Клиенты';
        $ar['ar_input'] = $request->all();
        $ar['items'] = $items->with('relOrders', 'relUser')->orderBy('id', 'desc')->paginate(25);

        return view('admin.client.index', $ar);
    }

}
