<?php
namespace App\Http\Controllers\Admin;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\RegistrRestoran;

class RegistrRestoranController extends Controller{
    function getList (Request $request){
        $items = RegistrRestoran::where('id', '>', 0);

        $ar = array();
        $ar['title'] = 'Заявки на регистрацию';
        $ar['ar_input'] = $request->all();
        $ar['items'] = $items->orderBy('id', 'desc')->paginate(25);

        return view('admin.registr_restoran.index', $ar);
    }

    function getDelete($id){
        $item = RegistrRestoran::findOrFail($id);
        $item->delete();

        return redirect()->back()->with('success', 'Удалено');
    }
}
