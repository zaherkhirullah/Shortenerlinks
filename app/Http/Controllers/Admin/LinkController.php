<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\LinkValidation;

use App\Http\Controllers\Controller;
use App\Http\Models\folder;
use App\Http\Models\Domain;
use App\Http\Models\Adstype;
use App\Http\Models\link;
use Session;
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
     // Show list of deleted links
     public function deletedLinks(link $link)
     {
           $links = $link->deletedLinks()->paginate(20);
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
      
        return view('admin.links.Form',compact('domains','folders','ads'));
    }
  /* build link  LinkValidation */
    public function store(LinkValidation $request)
    {  
      $this->NewItem($request->all());
      return redirect()->route('links.index');
      
    }

// show link details
public function show(link $link)
{
    return view('admin.links.show',compact('link'));
}
// edit link details
public function edit(link $link)
{
    return view('admin.links.Form',compact('link'));
}
// update function
public function update(LinkValidation $request, link $link)
{   
    Session::flash('success',' Sucessfully updated the ' .$request->slug . ' link .');
    return redirect()->route('links.index')->with( ['success'=>' Sucessfully Edited :)']);
}
// for hide link    
public function destroy(link $link)
{
    return $this->Deleteate($link , 1);
}
 // for unhide link    
 public function restore(link $link)
 {
    return $this->Deleteate($link , 0);
 }

// for delete link
public function delete(link $link)
{   
    Session::flash('success',' Sucessfully deleted the ' .$request->slug . ' link .');
    return redirect()->route('links.index');
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
      Session::flash('success',' Sucessfully Created the ' .$slug . ' link .');
     return $link ;
  }
  // Deleteate function For change isDeleted (To Active Or UnActive) Restore Or Delete Item in Database .
  Protected function Deleteate(link $link, $data)
  {
    $link = link::find($link->id);
    $isDeleted = $link->isDeleted;
    $Message = '';  $class = '';
 // Not Found Page
  if (is_null($link))
    return view('errors.NotFound');
   else
    {
      $class = 'warning';
     if($isDeleted == 1 && $data == 1 )
        $Message = ' This item is already deleted :)';
     else if($isDeleted == 0 && $data == 0 )
        $Message = ' This item is already restored :)';
     else
     {
      $link->isDeleted = $data;
       if($link->save())
       {
          $class = 'success';
         if($data == 1)
          $Message = ' Successfully has been deleted :)';
        else if($data == 0)
          $Message = ' Successfully has been restord :)';
       }
       else
       { 
          $class = 'error';
         if($data == 1)
          $Message = ' Error!!  has been filed delete :(';
        else if($data == 0)
          $Message = ' Error!!  has been filed restore :(';
       }
    }
   return redirect()->route('link.index')->with([$class =>   $link->slug .  $Message]);
   }
  }


}