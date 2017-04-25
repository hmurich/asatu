<?php
namespace App\Http\Controllers\Admin;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Restoran;
use App\Model\RestoranData;
use App\Model\SysDirectoryName;
use App\User;

class RestoranController extends Controller{
    function getIndex (Request $request){
        $items = Restoran::where('id', '>', 0);

        if ($request->has('filter.city_id') && $request->input('filter.city_id'))
            $items = $items->where('city_id', $request->input('filter.city_id'));

        if ($request->has('filter.name'))
            $items = $items->where('name', 'like', '%'.$request->input('filter.name').'%');

        $ar = array();
        $ar['title'] = 'Рестораны';
        $ar['ar_input'] = $request->all();
        $ar['items'] = $items->orderBy('id', 'desc')->paginate(25);
        $ar['ar_city'] = SysDirectoryName::where('parent_id', 3)->lists('name', 'id');
        $ar['ar_boolen_view'] = array(0=>'Нет', 1=>'Да');
        $ar['ar_delivery_type_ar'] = Restoran::getDeliveryTypeAr();

        return view('admin.restoran.index', $ar);
    }

    function getDelete($id){
        $item = Restoran::findOrFail($id);
        $user = User::findOrFail($item->user_id);
        $user->delete();

        return redirect()->back()->with('success', 'Удалено');
    }

    function getOpen($id){
        $item = Restoran::findOrFail($id);
        $item->is_open = ($item->is_open ? 0 : 1);
        $item->save();

        return redirect()->back()->with('success', 'Сохранено');
    }
}
