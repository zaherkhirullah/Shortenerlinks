<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Ticket;
use Illuminate\Http\Request;
use App\Http\Requests\TicketValidation;
use App\Http\Controllers\Controller;
use Session;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index(Ticket $tickets)
    {
       // Show list of Tickets
        $tickets = $tickets->Tickets()->paginate(20);
        return view('admin.tickets.index')->withTickets($tickets);
    }
    public function deletedtickets(Ticket $ticket)
    {
          $tickets = $ticket->deletedtickets()->paginate(20);
          return view('admin.tickets.index ',compact('tickets'));
    }
    public function closedTickets(Ticket $ticket)
    {
          $tickets = $ticket->closedTickets()->paginate(20);
          return view('admin.tickets.index ',compact('tickets'));
    }

    public function create()
    {
      return view('admin.tickets.Form');
    }

    public function store(TicketValidation $request, Ticket $ticket) 
    {
        $ticket->fill($request->all());
        $ticket->save();
        Session::flash('success',' Sucessfully created the ' .$request->name . ' Tickets .');
        return redirect()->route('tickets.index');
    }
    // show Ticket details
    public function show(Ticket $ticket)
    {
        return view('admin.tickets.show',compact('ticket'));
    }
    // edit Ticket details
    public function edit(Ticket $ticket)
    {
        return view('admin.tickets.Form',compact('ticket'));
    }
    // update function
    public function update(Request $request, Ticket $ticket)
    {    
        Session::flash('success' , 'Sucessfully has been edited the ' .$request->name .' Ticket :)');
        return redirect()->route('tickets.index');
    }
    // for hide Ticket    
    public function destroy(Ticket $ticket)
    {

        Session::flash('success' , 'Sucessfully has been hided the ' .$ticket->name .' Ticket :)');
        return redirect()->route('tickets.index');
    }
    // for delete Ticket
    public function delete(Ticket $ticket)
    {
        $name= $ticket->name;
        Session::flash('success' , 'Sucessfully has been deleted the ' .$name .' Ticket :)');
        return redirect()->route('tickets.index');
    }
}
