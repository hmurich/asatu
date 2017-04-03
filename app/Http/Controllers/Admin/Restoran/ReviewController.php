<?php
namespace App\Http\Controllers\Admin\Restoran;

use DB;
use Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Model\Restoran;
use App\Model\RestoranData;
use App\Model\SysDirectoryName;
use App\Model\RestoranKicthen;
use App\Model\RestoranLocation;
use App\Model\Menu;
use App\Model\Generators\ModelSnipet;
use App\Model\Review;

class ReviewController extends Controller{
    function getList (Request $request, $restoran_id = 0){
        $item = Restoran::findOrFail($restoran_id);

        $review = Review::where('restoran_id', $item->id)->where('parent_id', 0);

        $ar = array();
        $ar['title'] = "Отзывы";
        $ar['items'] = $review->with('relAnswer')->orderBy('id', 'desc')->get();
        $ar['item'] = $item;
        $ar['restoran'] = $item;

        $ar['ar_input'] = $request->all();

        return view('admin.restoran.review', $ar);
    }


}
