<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Tickets;
use Illuminate\Http\Request;
use App\Http\Requests\TicketValidation;
use App\Http\Controllers\Controller;
use Session;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Tickets $tickets)
    {
       // Show list of Tickets
        $tickets = $tickets->Tickets()->paginate(20);
        return view('home.Tickets')->withTickets($tickets);
    }

    public function create()
    {
      return view('home.Tickets');
    }

    public function store(TicketValidation $request, Tickets $ticket) 
    {
        $ticket->fill($request->all());
        $ticket->save();
        Session::flash('success',' Sucessfully created the ' .$request->name . ' Tickets .');
        return view('home.home');
    }
  
}
