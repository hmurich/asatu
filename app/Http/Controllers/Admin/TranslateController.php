<?php
namespace App\Http\Controllers\Admin;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\TransLib;
use App\Model\Generators\Translator;

class TranslateController extends Controller{
    function getIndex (Request $request){
        $items = TransLib::where('id', '>', 0);

        if ($request->has('filter.key'))
            $items = $items->where('key', 'like', '%'.$request->input('filter.key').'%');

        if ($request->has('filter.trans_ru'))
            $items = $items->where('trans_ru', 'like', '%'.$request->input('filter.trans_ru').'%');

        if ($request->has('filter.trans_kz'))
            $items = $items->where('trans_kz', 'like', '%'.$request->input('filter.trans_kz').'%');

        if ($request->has('filter.trans_en'))
            $items = $items->where('trans_en', 'like', '%'.$request->input('filter.trans_en').'%');

        $ar = array();
        $ar['title'] = 'Переводы';
        $ar['ar_input'] = $request->all();
        $ar['items'] = $items->orderBy('id', 'desc')->paginate(25);

        return view('admin.translator.index', $ar);
    }

    function getEdit(Request $request, $id = 0){
        $item = TransLib::find($id);

        $ar = array();
        if (!$item){
            $ar['title'] = 'Добавление перевода';
            $ar['action'] = action('Admin\TranslateController@postEdit');
        }
        else {
            $ar['title'] = 'Изменение перевода';
            $ar['action'] = action('Admin\TranslateController@postEdit', $item->id);
            $ar['item'] = $item;
        }

        return view('admin.translator.edit', $ar);
    }

    function postEdit(Request $request, $id = 0){
        if ($request->has('key') && TransLib::where('key', $request->input('key'))->where('id', '<>', $id)->count())
            return redirect()->back()->with('error', 'Системный код уже есть');

        $item = TransLib::find($id);
        if (!$item)
            $item = new TransLib();

        $item->key =  $request->input('key');
        $item->trans_ru =  $request->input('trans_ru');
        $item->trans_kz =  $request->input('trans_kz');
        $item->trans_en =  $request->input('trans_en');
        $item->save();

        Translator::destroiArCache();

        return redirect()->action('Admin\TranslateController@getIndex')->with('success', 'Сохранено');
    }

    function getDelete($id){
        $item = TransLib::findOrFail($id);
        $item->delete();

        return redirect()->back()->with('success', 'Удалено');
    }
}
