<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Contacts;
use Illuminate\Http\Request;
use App\Http\Requests\ContactsValidation;
use App\Http\Controllers\Controller;
use Session;
class ContactsController extends Controller
{
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
        return view('admin.contacts.Form');
    }
    // update function
    public function update(Request $request, Contacts $contact)
    {    
        Session::flash('success',' Sucessfully updated the ' .$request->name . ' Contacts .');
        return redirect()->route('contacts.index');
    }
    // for delete contact    
    public function destroy(Contacts $contact)
    { $contact = Contacts::find($contact)->first();
        $name= $contact->name;
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
