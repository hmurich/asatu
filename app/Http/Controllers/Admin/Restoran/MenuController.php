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
use App\Model\RestoranKicthen;
use App\Model\RestoranLocation;
use App\Model\Menu;
use App\Model\Generators\ModelSnipet;

class MenuController extends Controller{
    function getItem (Request $request, $restoran_id = 0){
        $item = Restoran::findOrFail($restoran_id);

        $ar = array();
        $ar['title'] = 'Меню ресторана "'.$item->name.'"';
        $ar['action'] = action('Admin\Restoran\MenuController@postItem', $item->id);
        $ar['items'] = Menu::where('restoran_id', $item->id)->paginate(25);

        $ar['item'] = $item;
        $ar['ar_all_kitchen'] = SysDirectoryName::where('parent_id', 5)->lists('name', 'id');
        $ar['ar_sel_kitchen'] = SysDirectoryName::whereIn('id', $item->relKitchens()->lists('kitchen_id'))->where('parent_id', 5)->lists('name', 'id');

        return view('admin.restoran.menu', $ar);
    }

    function postItem(Request $request, $restoran_id = 0){
        $restoran = Restoran::findOrFail($restoran_id);

        DB::beginTransaction();

        $item = new Menu();

        if ($request->hasFile('photo'))
            $item->photo = ModelSnipet::setImage($request->file('photo'), 'logo', 224, 151);

        $item->restoran_id = $restoran->id;
        $item->cat_id = $request->input('cat_id');
        $item->title = $request->input('title');
        $item->cost_item = $request->input('cost_item');
        $item->note = $request->input('note');
        $item->save();

        DB::commit();

        return redirect()->action('Admin\Restoran\MenuController@getItem', $restoran->id)->with('success', 'Сохранено');
    }

    function getDelete(Request $request, $id = 0){
        $item = Menu::find($id);
        $restoran = Restoran::findOrFail($item->restoran_id);
        $item->delete();

        return redirect()->action('Admin\Restoran\MenuController@getItem', $restoran->id)->with('success', 'Удалено');
    }


}
