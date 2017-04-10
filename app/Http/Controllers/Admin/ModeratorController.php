<?php
namespace App\Http\Controllers\Admin;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Moderator;
use App\User;
use Hash;
use App\Model\Generators\ModelSnipet;

class ModeratorController extends Controller{
    function getIndex (Request $request){
        $items = Moderator::where('id', '>', 0);
        if ($request->has('filter.email'))
            $items = $items->whereHas('relUser', function ($q) use ($request) {
                $q->where('email', 'like', '%'.$request->input('filter.email').'%');
            });

        if ($request->has('filter.f_name'))
            $items = $items->where('f_name', 'like', '%'.$request->input('filter.f_name').'%');

        if ($request->has('filter.s_name'))
            $items = $items->where('s_name', 'like', '%'.$request->input('filter.s_name').'%');

        if ($request->has('filter.p_name'))
            $items = $items->where('p_name', 'like', '%'.$request->input('filter.p_name').'%');

        $ar = array();
        $ar['title'] = 'Модераторы';
        $ar['ar_input'] = $request->all();
        $ar['items'] = $items->with('relUser')->orderBy('id', 'desc')->paginate(25);

        //echo '<pre>'; print_r($ar['ar_input']); echo '</pre>'; exit();

        return view('admin.moderator.index', $ar);
    }

    function getPassword (Request $request, $id){
        $item = Moderator::findOrFail($id);
        $user = User::findOrFail($item->user_id);

        $ar = array();
        $ar['title'] = 'Изменение логина пароля';
        $ar['action'] = action('Admin\ModeratorController@postPassword', $item->id);
        $ar['item'] = $item;
        $ar['user'] = $user;

        return view('admin.moderator.password', $ar);
    }

    function postPassword(Request $request, $id){
        $item = Moderator::findOrFail($id);
        $user = User::findOrFail($item->user_id);

        if (User::where('email', $request->input('email'))->where('id', '<>', $user->id)->count() > 0)
            return redirect()->back()->with('error', 'Email уже существует');

        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect()->action('Admin\ModeratorController@getIndex')->with('success', 'Сохранено');
    }

    function getEdit(Request $request, $id = 0){
        $item = Moderator::find($id);

        $ar = array();
        if (!$item){
            $ar['title'] = 'Добавление модератора';
            $ar['action'] = action('Admin\ModeratorController@postEdit');
        }
        else {
            $ar['title'] = 'Изменение модератора';
            $ar['action'] = action('Admin\ModeratorController@postEdit', $item->id);
            $ar['item'] = $item;
        }

        return view('admin.moderator.edit', $ar);
    }

    function postEdit(Request $request, $id = 0){
        if ($request->has('email') && User::where('email', $request->input('email'))->count())
            return redirect()->back()->with('error', 'Email уже существует');

        DB::beginTransaction();

        $item = Moderator::find($id);
        if (!$item){
            $user = new User();
            $user->type_id = 2;
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->save();

            $item = new Moderator();
            $item->user_id = $user->id;
        }

        $item->f_name =  $request->input('f_name');
        $item->s_name =  $request->input('s_name');
        $item->p_name =  $request->input('p_name');
        $item->phone =  $request->input('phone');
        $item->address =  $request->input('address');
        $item->note = $request->input('note');
        $item->generateTotalName();
        $item->save();

        DB::commit();

        return redirect()->action('Admin\ModeratorController@getIndex')->with('success', 'Сохранено');
    }

    function getDelete($id){
        DB::beginTransaction();

        $item = Moderator::findOrFail($id);
        $user = $item->relUser;
        $item->delete();
        $user->delete();

        DB::commit();

        return redirect()->back()->with('success', 'Удалено');
    }

    function getShow($id){
        $item = Moderator::findOrFail($id);

        $ar = array();
        $ar['title'] = 'Просмотр данных "'.$item->total_name.'"';
        $ar['item'] = $item;

        return view('admin.moderator.show', $ar);
    }
}
