<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Domain;
use Illuminate\Http\Request;
use App\Http\Requests\DomainValidation;
use App\Http\Controllers\Controller;

class DomainController extends Controller
{ 
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Domain $domain)
    {
        $domains = $domain->domains()->paginate(20);
        return view('admin.domains.index')->withDomains($domains);
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

    
// show link details
public function show(link $link)
{
    return view('admin.links.show');
}
// edit link details
public function edit(link $link)
{
    return view('admin.links.Form');
}
// update function
public function update(Request $request, link $link)
{    
    return redirect()->route('links.index')->with( ['success'=>' Sucessfully Edited :)']);
}
// for hide link    
public function destroy(link $link)
{
    return redirect()->route('links.index')->with( ['success'=>' Sucessfully hided :)']);
}
// for delete link
public function delete(link $link)
{
    return redirect()->route('links.index')->with( ['success'=>' Sucessfully deleted :)']);
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
