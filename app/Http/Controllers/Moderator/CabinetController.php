<?php
namespace App\Http\Controllers\Moderator;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use App\Model\Moderator;

class CabinetController extends Controller {
    protected $auth;

    function __construct(Guard $auth) {
        $this->auth = $auth;
        parent::__construct();
    }

    function getCabinet(Request $request){
        $item = Moderator::where('user_id', $this->auth->user()->id)->first();
        if (!$item)
            abort(404);

        $ar = array();
		$ar['title'] = 'Кабинет';
        $ar['item'] = $item;

        return view('moderator.index', $ar);
    }

    function postEdit(Request $request){
        $item = Moderator::where('user_id', $this->auth->user()->id)->first();
        if (!$item)
            abort(404);

        $item->f_name =  $request->input('f_name');
        $item->s_name =  $request->input('s_name');
        $item->p_name =  $request->input('p_name');
        $item->phone =  $request->input('phone');
        $item->address =  $request->input('address');
        $item->note = $request->input('note');
        $item->generateTotalName();
        $item->save();

        return redirect()->action('Moderator\CabinetController@getCabinet')->with('success', 'Сохранено');
    }

}
