<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\role;
use Illuminate\Http\Request;
use App\Http\Requests\RoleValidation;
use App\Http\Controllers\Controller;
use Session;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $roles =  role::all();
        return view('admin.roles.index',compact('roles'));     
    }

    public function create()
    {
        return view('admin.roles.Form');
    }
   
    public function store(RoleValidation $request)
    {   
        $role= new role();
        $role->fill($request->all());
        $role->save();
        return redirect()->route('roles.index')->with(['success'=>$request->slug .' Sucessfully Created :)']);
    }

    
    public function show(role $role)
    {
        
        return view('admin.roles.show',compact('role'));
    }

  
    public function edit(role $role)
    {
        return view('admin.roles.Form',compact('role'));
    }

 
    public function update(Request $request, role $role)
    {
        $role = role::find($role);
        $link= $link->update($request->all());
        $link->save();
        Session::flash('success' , 'Sucessfully Update' .$request->slug .' Role :)');
        return redirect()->route('roles.index');
    }

    
    public function destroy(role $role)
    {
        $role = role::find($role);
        $role->delete($role);
        $role->save();
        return redirect()->route('roles.index')->with(['success'=>$request->slug .' Sucessfully Deleted :)']);
    }
}
