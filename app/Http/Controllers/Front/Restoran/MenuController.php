<?php
namespace App\Http\Controllers\Front\Restoran;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Generators\UserLocation;
use App\Model\SysDirectoryName;
use App\Model\Restoran;
use App\Model\Menu;

class MenuController extends Controller{
    function getList (Request $request, $restoran_id) {
        $location = UserLocation::getLocation();
        if (!$location)
            return redirect()->action('Front\IndexController@getIndex')->with('error', 'Не найден адресс. Повотрите ввод');
        $restoran = Restoran::findOrFail($restoran_id);
        $items = Menu::where('restoran_id', $restoran->id)->where('is_active', 1);

        if ($request->has('kitchen') && count($request->input('kitchen')))
            $items = $items->whereIn('cat_id', $request->input('kitchen'));

        if ($request->has('name') && $request->input('name'))
            $items = $items->where('title', 'like', '%'.$request->input('name').'%');

        $ar = array();
        $ar['title'] = $restoran->name;
        $ar['restoran'] = $restoran;
        $ar['location'] = $location;
        $ar['items'] = $items->orderBy('id', 'desc')->paginate(24);

        $ar['ar_input'] = $request->all();
        $ar['location'] = $location;
        $ar['ar_city'] = SysDirectoryName::where('parent_id', 3)->lists('name', 'id');
        $ar['ar_kitchen'] = SysDirectoryName::where('parent_id', 5)->lists('name', 'id');

        return view('front.restoran.menu', $ar);
    }

    function postOrder(){

    }

}
