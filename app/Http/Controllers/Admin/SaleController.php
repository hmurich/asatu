<?php
namespace App\Http\Controllers\Admin;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Sale;
use App\Model\Restoran;

class SaleController extends Controller{
    function getIndex (Request $request){
        $items = Sale::where('id', '>', 0);

        if ($request->has('filter.id'))
            $items = $items->where('id', $request->input('filter.id'));

        if ($request->has('filter.restoran_id'))
            $items = $items->where('restoran_id', $request->input('filter.restoran_id'));

        $ar = array();
        $ar['title'] = 'Акции';
        $ar['ar_input'] = $request->all();
        $ar['items'] = $items->orderBy('id', 'desc')->paginate(25);
        $ar['ar_restoran'] = Restoran::orderBy('name', 'asc')->lists('name', 'id');

        return view('admin.sale.index', $ar);
    }

    function getEdit(Request $request, $id = 0){
        $item = Sale::find($id);

        $ar = array();
        if (!$item){
            $ar['title'] = 'Добавление акции';
            $ar['action'] = action('Admin\SaleController@postEdit');
        }
        else {
            $ar['title'] = 'Изменение акции';
            $ar['action'] = action('Admin\SaleController@postEdit', $item->id);
            $ar['item'] = $item;
        }
        $ar['ar_restoran'] = Restoran::orderBy('name', 'asc')->lists('name', 'id');

        return view('admin.sale.edit', $ar);
    }

    function postEdit(Request $request, $id = 0){
        $item = Sale::find($id);
        if (!$item)
            $item = new Sale();

        $item->restoran_id =  $request->input('restoran_id');
        $item->note =  $request->input('note');
        $item->note_kz =  $request->input('note_kz');
        $item->note_en =  $request->input('note_en');

        $item->save();

        return redirect()->action('Admin\SaleController@getIndex')->with('success', 'Сохранено');
    }

    function getDelete($id){
        $item = Sale::findOrFail($id);
        $item->delete();

        return redirect()->back()->with('success', 'Удалено');
    }

}
