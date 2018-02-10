<?php

namespace App\Http\Controllers\Users;

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
        return view('home.contacts')->withContacts($contacts);
    }

    public function create()
    {
      return view('home.contacts');
    }

    public function store(ContactsValidation $request, Contacts $model) 
    {
        
        $model->fill($request->all());
        $model->save();

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
  
}
