<?php
namespace App\Http\Controllers\Restoran;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use App\Model\Restoran;
use App\Model\Review;
use App\Model\SysDirectoryName;


class ReviewController extends Controller{
    protected $auth;

    function __construct(Guard $auth) {
        $this->auth = $auth;
        parent::__construct();
    }

    function getList (Request $request) {
        $restoran = Restoran::where('user_id', $this->auth->user()->id)->first();
        if (!$restoran)
            abort(404);

        $review = Review::where('restoran_id', $restoran->id)->where('parent_id', 0);

        $ar = array();
        $ar['title'] = "Отзывы";
        $ar['review'] = $review->with('relAnswer')->orderBy('id', 'desc')->get();
        $ar['restoran'] = $restoran;

        $ar['ar_input'] = $request->all();

        return view('restoran.review.index', $ar);
    }

    function postAnswer(Request $request){
        $restoran = Restoran::where('user_id', $this->auth->user()->id)->first();
        if (!$restoran)
            abort(404);

        $review = new Review();
        $review->restoran_id = $restoran->id;
        $review->user_id = $restoran->user_id;
        $review->raiting = 0;
        $review->name = $restoran->name;
        $review->parent_id = $request->input('parent_id');
        $review->note = $request->input('note');
        $review->save();

        return redirect()->back()->with('success', 'Сохранено');
    }
}
