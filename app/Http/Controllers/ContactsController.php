<?php

namespace App\Http\Controllers;

use App\Http\Models\Contacts;
use Illuminate\Http\Request;
use App\Http\Requests\ContactsValidation;
use Session;

class ContactsController extends Controller
{
    
    public function index(Contacts $contacts)
    {
       // Show list of contacts
        $contacts = $contacts->contacts()->paginate(20);
        return view('home.contacts')->withContacts($contacts);
    }

    public function create()
    {
      return view('home.contacts');
    }

    public function store(ContactsValidation $request, Contacts $contact) 
    {
        $contact->fill($request->all());
        $contact->save();
        Session::flash('success',' Sucessfully created the ' .$request->name . ' Contacts .');
        return view('home.home');
    }
  
}
