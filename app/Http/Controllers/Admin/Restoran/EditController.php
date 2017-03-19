<?php
namespace App\Http\Controllers\Admin\Restoran;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Restoran;
use App\Model\RestoranData;
use App\Model\SysDirectoryName;

class EditController extends Controller{
    function getIndex (Request $request, $id = 0){
        $items = Restoran::where('id', '>', 0);

        $ar = array();
        $ar['title'] = 'Рестораны';
        $ar['ar_input'] = $request->all();
        $ar['items'] = $items->orderBy('id', 'desc')->paginate(25);
        $ar['ar_city'] = SysDirectoryName::where('parent_id', 3)->lists('name', 'id');
        $ar['ar_boolen_view'] = array(0=>'Нет', 1=>'Да');

        return view('admin.restoran.index', $ar);
    }

    function postIndex(Request $request, $id = 0){

    }
}
