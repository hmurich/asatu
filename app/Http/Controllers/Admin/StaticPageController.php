<?php
namespace App\Http\Controllers\Admin;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\StaticPage;

class StaticPageController extends Controller{
    function getIndex (Request $request){
        $items = StaticPage::where('id', '>', 0);

        if ($request->has('filter.id'))
            $items = $items->where('id', $request->input('filter.id'));

        if ($request->has('filter.sys_key'))
            $items = $items->where('sys_key', 'like', '%'.$request->input('filter.sys_key').'%');

        if ($request->has('filter.title'))
            $items = $items->where('title', 'like', '%'.$request->input('filter.title').'%');

        if ($request->has('filter.note'))
            $items = $items->where('note', 'like', '%'.$request->input('filter.note').'%');

        $ar = array();
        $ar['title'] = 'Статические страницы';
        $ar['ar_input'] = $request->all();
        $ar['items'] = $items->orderBy('id', 'desc')->paginate(25);

        //echo '<pre>'; print_r($ar['ar_input']); echo '</pre>'; exit();

        return view('admin.static_page.index', $ar);
    }

    function getEdit(Request $request, $id = 0){
        $item = StaticPage::find($id);

        $ar = array();
        if (!$item){
            $ar['title'] = 'Добавление страницы';
            $ar['action'] = action('Admin\StaticPageController@postEdit');
        }
        else {
            $ar['title'] = 'Изменение страницы';
            $ar['action'] = action('Admin\StaticPageController@postEdit', $item->id);
            $ar['item'] = $item;
        }

        return view('admin.static_page.edit', $ar);
    }

    function postEdit(Request $request, $id = 0){
        $item = StaticPage::find($id);
        if (!$item)
            $item = new StaticPage();

        $item->sys_key =  $request->input('sys_key');
        $item->title =  $request->input('title');
        $item->note =  $request->input('note');
        $item->short_note =  $request->input('short_note');
        $item->title_kz =  $request->input('title_kz');
        $item->title_en = $request->input('title_en');
        $item->short_note_kz = $request->input('short_note_kz');
        $item->short_note_en = $request->input('short_note_en');
        $item->note_kz = $request->input('note_kz');
        $item->note_en = $request->input('note_en');
        $item->save();

        DB::commit();

        return redirect()->action('Admin\StaticPageController@getIndex')->with('success', 'Сохранено');
    }

    function getDelete($id){
        $item = StaticPage::findOrFail($id);
        $item->delete();

        return redirect()->back()->with('success', 'Удалено');
    }

    function getShow($id){
        $item = StaticPage::findOrFail($id);

        $ar = array();
        $ar['title'] = 'Просмотр данных "'.$item->title.'"';
        $ar['item'] = $item;

        return view('admin.static_page.show', $ar);
    }
}
