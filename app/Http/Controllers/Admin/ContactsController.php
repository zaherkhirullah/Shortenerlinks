<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Contacts;
use Illuminate\Http\Request;
use App\Http\Requests\ContactsValidation;
use App\Http\Controllers\Controller;
use Session;
class ContactsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    // Show list of contacts  
    public function index(Contacts $contacts)
    {
        $contacts = $contacts->contacts()->paginate(20);
        return view('admin.contacts.index',compact('contacts'));
    }

    public function create()
    {
        return redirect()->route('contacts.index');
    }

    public function store(ContactsValidation $request, Contacts $model) 
    {
    }
    
    // show contact details
    public function show(Contacts $contact)
    {
        return view('admin.contacts.show',compact('contact'));
    }
    // edit contact details
    public function edit(Contacts $contact)
    {
        return view('admin.contacts.Form',compact('contact'));
    }
    // update function
    public function update( ContactsValidation $request, Contacts $contact)
    {   $contact->update($request->all());
        $contact->save();
        Session::flash('success',' Sucessfully updated the ' .$request->name . ' Contacts .');
        return redirect()->route('contacts.index');
    }
    // for delete contact    
    public function destroy(Contacts $contact)
    {  
        $name= $contact->name;
        $contact = Contacts::find($contact)->first();
        $contact->delete();
        Session::flash('success',' Sucessfully deleted the ' .$name . ' Contacts .');
        return redirect()->route('contacts.index');
    }
    // for hide contact
    public function delete(Contacts $contact)
    {
        Session::flash('success',' Sucessfully hided the ' .$contact->name . ' Contacts .');
         return redirect()->route('contacts.index');
    }

}
