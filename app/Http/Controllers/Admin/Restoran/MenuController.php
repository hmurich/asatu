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
        $items = Menu::where('restoran_id', $item->id);

        if ($request->has('title'))
            $items = $items->where('title', 'like', '%'.$request->input('title').'%');

        if ($request->has('cat_id') && $request->input('cat_id') > 0)
            $items = $items->where('cat_id', $request->input('cat_id'));

        $ar = array();
        $ar['title'] = 'Меню ресторана "'.$item->name.'"';
        $ar['action'] = action('Admin\Restoran\MenuController@postItem', $item->id);
        $ar['items'] = $items->paginate(25);

        $ar['item'] = $item;
        $ar['ar_all_kitchen'] = SysDirectoryName::where('parent_id', 5)->lists('name', 'id');
        $ar['ar_sel_kitchen'] = SysDirectoryName::whereIn('id', $item->relKitchens()->lists('kitchen_id'))->where('parent_id', 5)->lists('name', 'id');
        $ar['ar_menu_type'] = SysDirectoryName::where('parent_id', 4)->lists('name', 'id');

        $ar['ar_input'] = $request->all();

        return view('admin.restoran.menu', $ar);
    }

    function getAdd(Request $request, $restoran_id = 0){
        $item = Restoran::findOrFail($restoran_id);

        $ar = array();
        $ar['title'] = 'Добавить меню ресторана "'.$item->name.'"';
        $ar['action'] = action('Admin\Restoran\MenuController@postItem', $item->id);

        $ar['item'] = $item;
        $ar['ar_all_kitchen'] = SysDirectoryName::where('parent_id', 5)->lists('name', 'id');
        $ar['ar_sel_kitchen'] = SysDirectoryName::whereIn('id', $item->relKitchens()->lists('kitchen_id'))->where('parent_id', 5)->lists('name', 'id');
        $ar['ar_menu_type'] = SysDirectoryName::where('parent_id', 4)->lists('name', 'id');

        return view('admin.restoran.menu_add', $ar);
    }

    function postItem(Request $request, $restoran_id = 0, $id = 0){
        $restoran = Restoran::findOrFail($restoran_id);

        DB::beginTransaction();

        $item = Menu::find($id);
        if (!$item)
            $item = new Menu();

        if ($request->hasFile('photo'))
            $item->photo = ModelSnipet::setImage($request->file('photo'), 'logo', 260, 170);

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

    function getOpen(Request $request, $id = 0){
        $item = Menu::find($id);
        $restoran = Restoran::findOrFail($item->restoran_id);

        $item->is_active = ($item->is_active ? 0 : 1);
        $item->save();

        return redirect()->action('Admin\Restoran\MenuController@getItem', $restoran->id)->with('success', 'Сохранено');
    }


}
