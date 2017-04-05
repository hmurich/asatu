<?php
namespace App\Http\Controllers\Restoran;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use App\Model\Restoran;
use App\Model\Menu;
use App\Model\SysDirectoryName;


class MenuController extends Controller{
    protected $auth;

    function __construct(Guard $auth) {
        $this->auth = $auth;
        parent::__construct();
    }

    function getList (Request $request) {
        $restoran = Restoran::where('user_id', $this->auth->user()->id)->first();
        if (!$restoran)
            abort(404);

        $menu = Menu::where('restoran_id', $restoran->id);

        if ($request->has('kitchen') && count($request->input('kitchen')))
            $menu = $menu->whereIn('cat_id', $request->input('kitchen'));

        if ($request->has('name') && $request->input('name'))
            $menu = $menu->where('title', 'like', '%'.$request->input('name').'%');

        $ar = array();
        $ar['title'] = "Меню";
        $ar['menu'] = $menu->orderBy('id', 'desc')->get();
        $ar['restoran'] = $restoran;

        $ar['ar_input'] = $request->all();
        $ar['ar_kitchen'] = SysDirectoryName::where('parent_id', 4)->orderBy('name', 'asc')->lists('name', 'id');

        return view('restoran.menu.index', $ar);
    }

    function getOpen(Request $request, $menu_id){
        $restoran = Restoran::where('user_id', $this->auth->user()->id)->first();
        if (!$restoran)
            abort(404);

        $menu = Menu::where('id', $menu_id)->where('restoran_id', $restoran->id)->first();
        if (!$menu)
            abort(404);

        $menu->is_active = ($menu->is_active ? 0 : 1);
        $menu->save();

        return redirect()->back()->with('success', 'Сохранено');
    }

}
