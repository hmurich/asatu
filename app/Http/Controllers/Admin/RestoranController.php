<?php
namespace App\Http\Controllers\Admin;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Restoran;
use App\Model\RestoranData;
use App\Model\SysDirectoryName;

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

        return view('admin.restoran.index', $ar);
    }
}
