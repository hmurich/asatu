<?php
namespace App\Http\Controllers\Admin;

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
        $tickets = Ticket::where('id', '>', 0);

        $ar = array();
        $ar['title'] = "Тикеты";
        $ar['tickets'] = $tickets->with('relUser', 'relRestoran')->orderBy('id', 'desc')->get();

        $ar['ar_input'] = $request->all();
        $ar['ar_status'] = Ticket::getStatusAr();

        return view('admin.ticket.index', $ar);
    }

    function getChangeStatus($ticket_id, $status_id){
        if (!in_array($status_id, array(0, 1, 2)))
            abort(404);

        $ticket = Ticket::findOrFail($ticket_id);
        $ticket->status_id = $status_id;
        $ticket->save();

        return back()->with('success', 'Сохранено');
    }


}
