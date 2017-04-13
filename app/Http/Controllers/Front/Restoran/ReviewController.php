<?php
namespace App\Http\Controllers\Front\Restoran;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Generators\UserLocation;
use App\Model\SysDirectoryName;
use App\Model\Restoran;
use App\Model\Review;
use Illuminate\Contracts\Auth\Guard;
use App\Model\Sale;

class ReviewController extends Controller{
    protected $auth;

    function __construct(Guard $auth) {
        $this->auth = $auth;
        parent::__construct();
    }

    function getList (Request $request, $restoran_id) {
        $location = UserLocation::getLocation();
        if (!$location)
            return redirect()->action('Front\IndexController@getIndex')->with('error', 'Не найден адресс. Повотрите ввод');
        $restoran = Restoran::findOrFail($restoran_id);
        $restoran->count_view++;
        $restoran->save();

        $items = Review::where('restoran_id', $restoran->id)->where('parent_id', 0);

        $sale = Sale::where('restoran_id', $restoran->id)->orderBy('id', 'desc')->first();

        $ar = array();
        $ar['title'] = $restoran->name;
        $ar['restoran'] = $restoran;
        $ar['location'] = $location;
        $ar['items'] = $items->orderBy('id', 'desc')->paginate(24);
        $ar['sale'] = $sale;

        $ar['ar_input'] = $request->all();
        $ar['location'] = $location;
        $ar['ar_city'] = SysDirectoryName::where('parent_id', 3)->lists('name', 'id');

        $ar['auth'] = $this->auth;

        return view('front.restoran.review', $ar);
    }

    function postList(Request $request, $restoran_id){
        $location = UserLocation::getLocation();
        if (!$location)
            return redirect()->action('Front\IndexController@getIndex')->with('error', 'Не найден адресс. Повотрите ввод');
        $restoran = Restoran::findOrFail($restoran_id);

        if ($this->auth->guest())
            return redirect()->action('Front\Restoran\ReviewController@getList', $restoran->id)->with('error', 'Не найден адресс. Повотрите ввод');

        $user_id = $this->auth->user()->id;

        DB::beginTransaction();

        $item = new Review();
        $item->user_id = $user_id;
        $item->parent_id = 0;
        $item->restoran_id = $restoran->id;
        $item->raiting = $request->input('raiting');
        $item->name = $request->input('name');
        $item->note = $request->input('note');
        $item->save();

        $raiting = $restoran->relReiting;
        $raiting->vote_count = $raiting->vote_count + 1;
        $raiting->vote_sum = $raiting->vote_sum + $item->raiting;
        $raiting->vote_avg = $raiting->vote_sum/$raiting->vote_count;
        $raiting->save();

        $restoran->raiting = round($raiting->vote_avg, 2);
        $restoran->save();

        DB::commit();

        return redirect()->action('Front\Restoran\ReviewController@getList', $restoran->id)->with('success', 'Сохранено');
    }

}
