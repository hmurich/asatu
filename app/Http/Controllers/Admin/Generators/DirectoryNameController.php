<?php
namespace App\Http\Controllers\Admin\Generators;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\SysDirectoryName;

class DirectoryNameController extends Controller{
    protected $title = '';
    protected $parent_id = 0;
    protected $action_class = 'Admin\Generators\ModeratorController';

    function getIndex (Request $request){
        $items = SysDirectoryName::where('parent_id', $this->parent_id);

        if ($request->has('filter.name'))
            $items = $items->where('name', 'like', '%'.$request->input('filter.name').'%');

        if ($request->has('filter.note'))
            $items = $items->where('note', 'like', '%'.$request->input('filter.note').'%');

        if ($request->has('filter.sys_key'))
            $items = $items->where('sys_key', 'like', '%'.$request->input('filter.sys_key').'%');

        if ($request->has('filter.id'))
            $items = $items->where('id', 'like', $request->input('filter.id'));

        $ar = array();
        $ar['title'] = $this->title;

        $ar['ar_input'] = $request->all();
        $ar['items'] = $items->orderBy('id', 'desc')->paginate(25);
        $ar['action_class'] = $this->action_class;

        return view('admin.directory_name.index', $ar);
    }

    function getEdit(Request $request, $id = 0){
        $item = SysDirectoryName::find($id);

        $ar = array();
        if (!$item){
            $ar['title'] = 'Добавление';
            $ar['action'] = action($this->action_class.'@postEdit');
        }
        else {
            $ar['title'] = 'Изменение';
            $ar['action'] = action($this->action_class.'@postEdit', $item->id);
            $ar['item'] = $item;
        }

        return view('admin.directory_name.edit', $ar);
    }

    function postEdit(Request $request, $id = 0){
        if ($request->has('sys_key') && SysDirectoryName::where('sys_key', $request->input('sys_key'))->where('id', '<>', $id)->count())
            return redirect()->back()->with('error', 'Системный код уже существует');

        DB::beginTransaction();

        $item = SysDirectoryName::find($id);
        if (!$item)
            $item = new SysDirectoryName();

        $item->sys_key =  $request->input('sys_key');
        $item->parent_id =  $this->parent_id;
        $item->name	=  $request->input('name');
        $item->note =  $request->input('note');
        $item->save();

        DB::commit();

        return redirect()->action($this->action_class.'@getIndex')->with('success', 'Сохранено');
    }

    function getDelete($id){
        $item = SysDirectoryName::findOrFail($id);
        $item->delete();

        return redirect()->back()->with('success', 'Удалено');
    }
}
