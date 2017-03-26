<?php
namespace App\Http\Controllers\Restoran;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Generators\UserLocation;
use Illuminate\Contracts\Auth\Guard;

class OrderController extends Controller{
    protected $auth;

    function __construct(Guard $auth) {
        $this->auth = $auth;
        parent::__construct();
    }

    function getList (Request $request) {
        echo 'asdfsadf'; exit();
        $items = Restoran::where('id', '>', 0);
        if ($request->has('name'))
            $items = $items->where('name', 'like', '%'.$request->input('name').'%');

        $ar = array();
        $ar['title'] = $this->translator->getTrans('catalog_title');
        $ar['items'] = $items->with('relData')->orderBy('raiting', 'desc')->paginate(24);

        $ar['ar_input'] = $request->all();
        $ar['location'] = $location;
        $ar['ar_city'] = SysDirectoryName::where('parent_id', 3)->lists('name', 'id');

        return view('front.catalog.index', $ar);
    }
}
