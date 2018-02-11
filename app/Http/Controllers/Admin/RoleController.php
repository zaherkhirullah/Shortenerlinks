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
        $this->middleware('admin');
    }
    public function index()
    {
        $role = new role();
        $roles = $role->roles()->paginate(10);
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

    public function update(RoleValidation $request, role $role)
    {
         $role->update($request->all());
         if($role->save())
         Session::flash('success' , 'Sucessfully Updated The ' .$request->slug .' Role :)');
        return redirect()->route('roles.index');
    }    
    public function destroy(role $role)
    {          
        $Role = role::find($role)->first();
        $name =$Role->name;
        $Role->delete();
        if($Role->save())
        Session::flash('success' , 'Sucessfully deleted The ' .$name .' Role :)');
        return redirect()->route('roles.index');
    }
}
