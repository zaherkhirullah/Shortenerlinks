<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Contacts;
use Illuminate\Http\Request;
use App\Http\Requests\ContactsValidation;

use App\Http\Controllers\Controller;
class ContactsController extends Controller
{
    
    public function index(Contacts $contacts)
    {
       // Show list of contacts
        $contacts = $contacts->contacts()->paginate(20);
        return view('admin.contacts.index')->withContacts($contacts);
    }

    public function create()
    {
      return view('admin.contacts.Form');
    }

    public function store(ContactsValidation $request, Contacts $model) 
    {
        
        $model->fill($request->all());
        $model->save();
        return view('admin.contacts.Form')-> with( ['message'=>' Sucessfully Created :)']);
    }

    
   
// show contact details
public function show(Contacts $contact)
{
    return view('admin.contacts.show');
}
// edit contact details
public function edit(Contacts $contact)
{
    return view('admin.contacts.Form');
}
// update function
public function update(Request $request, Contacts $contact)
{    
    return redirect()->route('contacts.index')->with( ['success'=>' Sucessfully Edited :)']);
}
// for hide contact    
public function destroy(Contacts $contact)
{
    return redirect()->route('contacts.index')->with( ['success'=>' Sucessfully hided :)']);
}
// for delete contact
public function delete(Contacts $contact)
{
    return redirect()->route('contacts.index')->with( ['success'=>' Sucessfully deleted :)']);
}

}
