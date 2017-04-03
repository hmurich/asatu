<?php
namespace App\Http\Controllers\Admin\Restoran;

use DB;
use Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Model\Restoran;
use App\Model\RestoranData;
use App\Model\SysDirectoryName;
use App\Model\RestoranDistance;
use App\Model\RestoranLocation;
use App\Model\Generators\ModelSnipet;
use App\Model\RestoranArea;

class AreaController extends Controller{
    function getList (Request $request, $restoran_id = 0, $location_id = 0){
        $item = Restoran::findOrFail($restoran_id);
        $location = RestoranLocation::findOrFail($location_id);

        $items = RestoranArea::where('location_id', $location->id)->orderBy('sort_index', 'desc')->paginate(24);

        $ar = array();
        $ar['title'] = 'Зоны доставки "'.$item->name.'"';
        $ar['items'] = $items;

        $ar['item'] = $item;
        $ar['location'] = $location;

        return view('admin.restoran.area.index', $ar);
    }

    function getItem(Request $request, $restoran_id, $location_id, $id = 0){
        $item = Restoran::findOrFail($restoran_id);
        $location = RestoranLocation::findOrFail($location_id);
        $area = RestoranArea::find($id);

        $ar = array();
        if ($area){
            $ar['title'] = 'Изменение зоны доставки "'.$location->name.'"';
            $ar['action'] = action('Admin\Restoran\AreaController@postItem', array($item->id, $location->id, $area->id));
            $ar['poly_coords'] = $area->generateView();
        }
        else {
            $ar['title'] = 'Создание зоны доставки';
            $ar['action'] = action('Admin\Restoran\AreaController@postItem', array($item->id, $location->id));
            $ar['poly_coords'] = 'none';
        }

        $ar['area'] = $area;
        $ar['item'] = $item;
        $ar['location'] = $location;

        return view('admin.restoran.area.item', $ar);
    }

    function postItem(Request $request, $restoran_id, $location_id, $id = 0){
        $restoran = Restoran::findOrFail($restoran_id);
        $location = RestoranLocation::findOrFail($location_id);

        DB::beginTransaction();

        $item = RestoranArea::find($id);
        if (!$item)
            $item = new RestoranArea();

        $item->restoran_id = $restoran->id;
        $item->city_id = $restoran->city_id;
        $item->location_id = $location->id;
        $item->sort_index = $request->input('sort_index');
        $item->coords = $request->input('coords');
        $item->cost = $request->input('cost');
        $item->find_coords = $item->generateToFind();
        $item->save();

        DB::commit();

        return redirect()->action('Admin\Restoran\AreaController@getList', array($restoran->id, $location->id))->with('success', 'Сохранено');
    }

    function getDelete(Request $request, $id){
        $item = RestoranArea::findOrFail($id);
        $item->delete();

        return redirect()->back()->with('success', 'Удалено');
    }


}
