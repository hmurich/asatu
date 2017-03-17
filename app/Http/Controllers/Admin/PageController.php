<?php
namespace App\Http\Controllers\Admin;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Page;
use App\Model\Generators\ModelSnipet;

class PageController extends Controller{
    function getIndex (Request $request){
        $items = Page::where('id', '>', 0);

        if ($request->has('filter.id'))
            $items = $items->where('id', $request->input('filter.id'));

        if ($request->has('filter.sys_key'))
            $items = $items->where('sys_key', 'like', '%'.$request->input('filter.sys_key').'%');

        if ($request->has('filter.title'))
            $items = $items->where('title', 'like', '%'.$request->input('filter.title').'%');

        if ($request->has('filter.type_id') && $request->input('filter.type_id'))
            $items = $items->where('type_id', $request->input('filter.type_id'));

        $ar = array();
        $ar['title'] = 'Cтраницы';
        $ar['ar_input'] = $request->all();
        $ar['items'] = $items->orderBy('id', 'desc')->paginate(25);
        $ar['ar_type'] = Page::getTypeAr();


        //echo '<pre>'; print_r($ar['ar_input']); echo '</pre>'; exit();

        return view('admin.page.index', $ar);
    }

    function getEdit(Request $request, $id = 0){
        $item = Page::find($id);

        $ar = array();
        if (!$item){
            $ar['title'] = 'Добавление страницы';
            $ar['action'] = action('Admin\PageController@postEdit');
        }
        else {
            $ar['title'] = 'Изменение страницы';
            $ar['action'] = action('Admin\PageController@postEdit', $item->id);
            $ar['item'] = $item;
        }
        $ar['ar_type'] = Page::getTypeAr();

        return view('admin.page.edit', $ar);
    }

    function postEdit(Request $request, $id = 0){
        $item = Page::find($id);
        if (!$item)
            $item = new Page();

        $item->type_id =  $request->input('type_id');
        $item->title =  $request->input('title');
        $item->note =  $request->input('note');
        $item->short_note =  $request->input('short_note');
        $item->title_kz =  $request->input('title_kz');
        $item->title_en = $request->input('title_en');
        $item->short_note_kz = $request->input('short_note_kz');
        $item->short_note_en = $request->input('short_note_en');
        $item->note_kz = $request->input('note_kz');
        $item->note_en = $request->input('note_en');

        if ($request->input('alias'))
            $item->alias = $request->input('alias');
        else
            $item->alias = mb_strtolower(ModelSnipet::translitString($item->title));

        if (Page::where('alias', $item->alias)->where('id', '<>', $id)->count())
            return redirect()->back()->with('error', 'Альяс уже есть');

        $item->save();

        DB::commit();

        return redirect()->action('Admin\PageController@getIndex')->with('success', 'Сохранено');
    }

    function getDelete($id){
        $item = Page::findOrFail($id);
        $item->delete();

        return redirect()->back()->with('success', 'Удалено');
    }

    function getShow($id){
        $item = Page::findOrFail($id);

        $ar = array();
        $ar['title'] = 'Просмотр данных "'.$item->title.'"';
        $ar['item'] = $item;

        return view('admin.page.show', $ar);
    }
}
