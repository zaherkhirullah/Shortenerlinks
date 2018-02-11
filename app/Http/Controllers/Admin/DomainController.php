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
        $this->middleware('auth');
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
        $this->NewItem($request->all());

        return redirect()->route('domains.index')
        ->with(['success'=>$request->name .' Sucessfully Created :)']);
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
    public function update(Request $request, domain $domain)
    {    $domain = domain::findOrfail($domain);
            $domain->name =$request->name;
            $domain->slug =$request->slug;
            $domain->url =$request->url;
            $domain->save();
        Session::flash('success',' Sucessfully update the' .$request->name . 'domain .');
        return redirect()->route('domains.index');

    }
// for hide domain    
    public function destroy(domain $domain)
    {
        $domain =domain::find($domain);
        $domain->delete();
        $domain->save();
        
        return redirect()->route('domains.index')->with( ['success'=>' Sucessfully deleted :)']);
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
