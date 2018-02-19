<?php

namespace App\Http\Controllers\Users;

use App\Http\Models\Ticket;
use Illuminate\Http\Request;
use App\Http\Requests\TicketValidation;
use App\Http\Controllers\Controller;
use Session;
use Auth;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
     public function index(Ticket $ticket)
    {
          $tickets = $ticket->UserTickets()->paginate(20);
          return view('users.tickets.index ',compact('tickets'));
    }
    public function UserDeletedTickets(Ticket $ticket)
    {
          $tickets = $ticket->deletedtickets()->paginate(20);
          return view('users.tickets.index ',compact('tickets'));
    }
    public function UserClosedTickets(Ticket $ticket)
    {
          $tickets = $ticket->closedTickets()->paginate(20);
          return view('users.tickets.index ',compact('tickets'));
    }
    
    public function create()
    {
        return view('users.tickets.Form');
    }

  
    public function store(TicketValidation $request)
    {   $ticket  =new Ticket();
        $ticket->fill($request->all());
        $ticket->user_id = Auth::id();
        $ticket->save();
        Session::flash('success' , 'Sucessfully has been created the ' .$request->name .' Ticket :)');
     
       return redirect()->route('ticket.index');
    }
    
    // show Ticket details
    public function show(Ticket $ticket)
    {
        return view('users.tickets.show',compact('ticket'));
    }
    // edit Ticket details
    public function edit(Ticket $ticket)
    {
        return view('users.tickets.Form',compact('ticket'));
    }
    // update function
    public function update(Request $request, Ticket $ticket)
    {    
        $ticket->update($request->all());
        Session::flash('success' , 'Sucessfully has been edited the ' .$request->name .' Ticket :)');
        return redirect()->route('ticket.index');
    }
    // for hide Ticket    
    public function destroy(Ticket $ticket)
    {

        Session::flash('success' , 'Sucessfully has been hided the ' .$ticket->name .' Ticket :)');
        return redirect()->route('ticket.index');
    }
    // for delete Ticket
    public function delete(Ticket $ticket)
    {
        $name= $ticket->name;
        Session::flash('success' , 'Sucessfully has been deleted the ' .$name .' Ticket :)');
        return redirect()->route('ticket.index');
    }

  
}
