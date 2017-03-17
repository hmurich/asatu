<?php
namespace App\Http\Controllers\Admin;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\SiteSetting;

class SiteSettingController extends Controller{
    function getIndex (Request $request){
        $ar_keys = SiteSetting::getKeyAr();
        $ar_value = array();
        foreach ($ar_keys as $key) {
            $ar_value[$key] = SiteSetting::getNameByKey($key);
        }
        $ar_titles = SiteSetting::getKeyArName();

        $ar = array();
		$ar['ar_value'] = $ar_value;
        $ar['ar_titles'] = $ar_titles;
        $ar['action'] = action('Admin\SiteSettingController@postIndex');

		$ar['title'] = 'Настройки сайта';

        return view('admin.site_setting.index', $ar);
    }

    function postIndex(Request $request){
        $data = $request->all();
        if (!isset($data['ar']))
            abort(404);

        DB::beginTransaction();

        $ar_keys = SiteSetting::getKeyAr();
        foreach ($data['ar'] as $key => $name) {
            if (!in_array($key, $ar_keys))
                continue;

            $el = SiteSetting::where('key', $key)->first();
            if (!$el){
                $el = new SiteSetting();
                $el->key = $key;
            }
            $el->name = $name;
            $el->save();
        }

        DB::commit();

        return redirect()->back()->with('success', 'Сохранено');
    }

}
