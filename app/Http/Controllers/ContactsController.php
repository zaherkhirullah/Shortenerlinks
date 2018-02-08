<?php

namespace App\Http\Controllers;

use App\Http\Models\Contacts;
use Illuminate\Http\Request;
use App\Http\Requests\ContactsValidation;

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

    public function store(ContactsValidation $request)
    {
        $this->NewItem($request->all());

        return view('home.contacts')-> with( ['message'=>' Sucessfully Created :)']);
    }

    
    public function show(Contacts $contacts)
    {
        //
    }

    
    public function edit(Contacts $contacts)
    {
        //
    }

    

    public function update(Request $request, Contacts $contacts)
    {
        //
    }

   
    public function destroy(Contacts $contacts)
    {
        //
    }
  // NewItemew for create new item in table(for calling in store).
    protected function NewItem(array $data)
    {
     return Contacts::create(
        [
         'name'    =>  $data['name'],
         'email'  => $data['email'],
         'subject'  => $data['subject'],
         'Message'       =>  $data['Message'],
        ]);
    }
}
