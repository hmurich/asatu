<?php
namespace App\Http\Controllers\Restoran;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use App\Model\Restoran;
use App\Model\Ticket;


class TicketController extends Controller{
    protected $auth;

    function __construct(Guard $auth) {
        $this->auth = $auth;
        parent::__construct();
    }

    function getList (Request $request) {
        $restoran = Restoran::where('user_id', $this->auth->user()->id)->first();
        if (!$restoran)
            abort(404);

        $tickets = Ticket::where('restoran_id', $restoran->id);

        $ar = array();
        $ar['title'] = "Тикеты";
        $ar['tickets'] = $tickets->orderBy('id', 'desc')->get();
        $ar['restoran'] = $restoran;

        $ar['action'] = action('Restoran\TicketController@postSave');
        $ar['ar_input'] = $request->all();
        $ar['ar_status'] = Ticket::getStatusAr();

        return view('restoran.ticket.index', $ar);
    }



    function postSave(Request $request){
        $restoran = Restoran::where('user_id', $this->auth->user()->id)->first();
        if (!$restoran)
            abort(404);

        $review = new Ticket();
        $review->restoran_id = $restoran->id;
        $review->user_id = $restoran->user_id;
        $review->status_id = 0;
        $review->title = $request->input('title');
        $review->note = $request->input('note');
        $review->save();

        return redirect()->back()->with('success', 'Сохранено');
    }
}
