<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(Ticket $ticket)
    {
          $tickets = $ticket->deletedTickets()->paginate(20);
          return view('users.tickets.index ',compact('tickets'));
    }
    public function deletedtickets(Ticket $ticket)
    {
          $tickets = $ticket->deletedtickets()->paginate(20);
          return view('users.tickets.index ',compact('tickets'));
    }
    public function closedTickets(Ticket $ticket)
    {
          $tickets = $ticket->closedTickets()->paginate(20);
          return view('users.tickets.index ',compact('tickets'));
    }
    
    public function create()
    {
        
    }

  
    public function store(Request $request)
    {
        
    }

 
    public function show(Ticket $ticket)
    {
        
    }

    public function edit(Ticket $ticket)
    {
        //
    }

    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    public function destroy(Ticket $ticket)
    {
        //
    }
}
