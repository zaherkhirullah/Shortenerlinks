<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\LinkValidation;

use App\Http\Controllers\Controller;
use App\Http\Models\folder;
use App\Http\Models\Domain;
use App\Http\Models\Adstype;
use App\Http\Models\link;

use Auth;
class LinkController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
// Show list of links
    public function index(link $link)
    {
          $links = $link->links()->paginate(20);
          // $deleteform = $link->deleteForm();
          return view('admin.links.index')->withLinks($links);
    }
    public function create()
    {
        //create new link

        $domains = Domain::pluck('name', 'id');
        $selectedDomain = 1;
        $ads=Adstype::pluck('name', 'id');
        $selectedAds =1;
        $folders=folder::pluck('name', 'id');
        $selectedfolder =1;
        return view('admin.links.Form',
                    compact('domains','selectedDomain','folders','selectedfolder','ads','selectedAds')
                   );
    }
  /* build link  LinkValidation */
    public function store(LinkValidation $request)
    {  
      $this->NewItem($request->all());
      return redirect()->route('links.index')
      ->with(['success'=>$request->slug .' Sucessfully Created :)']);
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

    /*
    |------------------------
    |  private Functions
    |------------------------
    */
   
  // NewItemew for create new item in table(for calling in store).
  protected function NewItem(array $data)
  {   
     $alias=($data['alias'])?: null;
     $slug =($data['alias'])?: str_random(10);
   
     $domain_id = $data['domain_id'];
     $domain = Domain::find($domain_id);
     $shorted_url =($domain_id ==1)?url('/'. $slug) : $domain->url .'/'. $slug;
     
     $link = link::create(
      [
        'user_id'    => Auth::id(),
        'domain_id'  => $domain_id ,
        'folder_id'  => $data['folder_id'],
        'ad_id'      => $data['ad_id'],
        'alias'      => $alias,
        'slug'       => $slug,
        'url'        => $data['url'],
        'shorted_url' =>$shorted_url ,
      ]);
 return $link ;
  }


}