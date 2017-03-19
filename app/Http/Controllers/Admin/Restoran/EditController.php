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
        $item = Restoran::find($id);

        $ar = array();
        if ($item){
            $ar['title'] = 'Изменение ресторана';
            $ar['item'] = $item;
            $ar['action'] = action('Admin\Restoran\EditController@postIndex', $item->id);
        }
        else {
            $ar['title'] = 'Добавление ресторана';
            $ar['action'] = action('Admin\Restoran\EditController@postIndex');
        }

        $ar['ar_city'] = SysDirectoryName::where('parent_id', 3)->lists('name', 'id');
        $ar['ar_boolen_view'] = array(0=>'Нет', 1=>'Да');

        return view('admin.restoran.edit', $ar);
    }

    function postIndex(Request $request, $id = 0){

    }
}
