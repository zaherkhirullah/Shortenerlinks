<?php

namespace App\Http\Controllers\Users;

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
        return view('home.tickets')->withTickets($tickets);
    }

     
    public function create()
    {
        return view('users.tickets.Form');
    }

  
    public function store(TicketValidation $request)
    {
        $ticket->fill($request->all());
        $ticket->user_id = Auth::id();
        $ticket->save();
        Session::flash('success' , 'Sucessfully has been created the ' .$request->name .' Ticket :)');
     
       return redirect()->route('tickets.index');
    }
    
    // show Ticket details
    public function show(Ticket $ticket)
    {
        return view('users.tickets.show',compact('Ticket'));
    }
    // edit Ticket details
    public function edit(Ticket $ticket)
    {
        return view('users.tickets.Form',compact('Ticket'));
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
