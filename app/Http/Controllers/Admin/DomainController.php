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
        return view('admin.domains.create');
    }

  
    public function store(DomainValidation $request)
    {
        $this->NewItem($request->all());

        return redirect()->route('domains.index')
        ->with(['success'=>$request->name .' Sucessfully Created :)']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function show(Domain $domain)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function edit(Domain $domain)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Domain $domain)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function destroy(Domain $domain)
    {
        //
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
