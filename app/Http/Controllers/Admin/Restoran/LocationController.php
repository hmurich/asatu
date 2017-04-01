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

class LocationController extends Controller{
    function getList (Request $request, $restoran_id = 0){
        $item = Restoran::findOrFail($restoran_id);

        $ar = array();
        $ar['title'] = 'Зоны доставки "'.$item->name.'"';
        $ar['action'] = action('Admin\Restoran\LocationController@postItem', $item->id);
        $ar['items'] = RestoranLocation::where('restoran_id', $item->id)->with('relArea')->paginate(25);

        $ar['item'] = $item;
        $ar['ar_all_kitchen'] = SysDirectoryName::where('parent_id', 5)->lists('name', 'id');
        $ar['ar_sel_kitchen'] = SysDirectoryName::whereIn('id', $item->relKitchens()->lists('kitchen_id'))->where('parent_id', 5)->lists('name', 'id');

        return view('admin.restoran.location', $ar);
    }

    function getItem(Request $request, $restoran_id, $id = 0){
        $item = Restoran::findOrFail($restoran_id);
        $location = RestoranLocation::find($id);

        $ar = array();
        if ($location){
            $ar['title'] = 'Изменение исходной точки "'.$location->name.'"';
            $ar['action'] = action('Admin\Restoran\LocationController@postItem', array($item->id, $location->id));
        }
        else {
            $ar['title'] = 'Создание исходной точки';
            $ar['action'] = action('Admin\Restoran\LocationController@postItem', $item->id);
        }

        $ar['location'] = $location;
        $ar['item'] = $item;
        $ar['city'] = SysDirectoryName::findOrFail($item->city_id);

        return view('admin.restoran.location_add', $ar);
    }

    function postItem(Request $request, $restoran_id, $id = 0){
        $restoran = Restoran::findOrFail($restoran_id);

        DB::beginTransaction();

        $item = RestoranLocation::find($id);
        if (!$item)
            $item = new RestoranLocation();

        $item->restoran_id = $restoran->id;
        $item->lng = $request->input('lng');
        $item->lat = $request->input('lat');
        $item->name = $request->input('name');
        $item->address = $request->input('address');
        $item->save();

        DB::commit();

        return redirect()->action('Admin\Restoran\LocationController@getList', $restoran->id)->with('success', 'Сохранено');
    }

    function getDelete(Request $request, $id = 0){
        $item = RestoranLocation::find($id);
        $restoran = Restoran::findOrFail($item->restoran_id);
        $item->delete();

        return redirect()->action('Admin\Restoran\LocationController@getList', $restoran->id)->with('success', 'Удалено');
    }


}
