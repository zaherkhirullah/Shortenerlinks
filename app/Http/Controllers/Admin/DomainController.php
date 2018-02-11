<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Domain;
use Illuminate\Http\Request;
use App\Http\Requests\DomainValidation;
use App\Http\Controllers\Controller;
use Session;
class DomainController extends Controller
{ 
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index(Domain $domain)
    {
        $domains = $domain->domains()->paginate(20);
        return view('admin.domains.index',compact('domains'));
    }

  
    public function create()
    {
        return view('admin.domains.Form');
    }

  
    public function store(DomainValidation $request)
    {   
        $domain =new domain();
        $domain->fill($request->all());
        $domain->save();
        Session::flash('success',' Sucessfully Created the ' .$request->name . ' domain .');
        return redirect()->route('domains.index');
    }

    
    // show domain details
    public function show(domain $domain)
    {
        return view('admin.domains.show',compact('domain'));
    }
    // edit domain details
    public function edit(domain $domain)
    {
        return view('admin.domains.Form',compact('domain'));
    }
    // update function
    public function update(DomainValidation $request, domain $domain)
    {         
        $domain->name =$request->name;
        $domain->slug =$request->slug;
        $domain->url =$request->url;
        $domain->save();
            Session::flash('success',' Sucessfully update the ' .$request->name . ' domain .');
        return redirect()->route('domains.index');

    }
// for hide domain    
    public function destroy(domain $domain)
    {   
        $name = $domain->url;
        $domain = domain::find($domain)->first();
        $domain->delete();
        Session::flash('success',' Sucessfully deleted the ' .$name . ' domain .');
        return redirect()->route('domains.index');
    }

// NewItemew for create new item in table(for calling in store).
    protected function NewItem(array $data)
    { 
    $Domain = Domain::create(
        [
            'name'  => $data['name'],
            'slug'  => $data['slug'],
            'url'   => $data['url'],
        ]);
    return $Domain ;
    }


}
