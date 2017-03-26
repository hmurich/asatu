<?php
namespace App\Http\Controllers\Restoran;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Generators\UserLocation;
use Illuminate\Contracts\Auth\Guard;
use App\Model\Restoran;

class RestoranController extends Controller{
    protected $auth;

    function __construct(Guard $auth) {
        $this->auth = $auth;
        parent::__construct();
    }

    function getOpen (Request $request) {
        $restoran = Restoran::where('user_id', $this->auth->user()->id)->first();
        if (!$restoran)
            abort(404);

        $restoran->is_open = ($restoran->is_open ? 0 : 1);
        $restoran->save();

        return redirect()->back()->with('success', 'Сохранено');
    }
}
