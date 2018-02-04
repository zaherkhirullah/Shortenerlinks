<?php

namespace App\Http\Controllers;

use App\link;
use Illuminate\Http\Request;
use App\Http\Requests\LinkValidation;
use App\Domain;
use App\AdsTypes;

class LinkController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(link $link)
    {
        // Show list of links
          $links = $link->links()->paginate(20);
          $deleteform = $this->deleteForm();
         return view('users.links.index',compact('deleteform'))->withLinks($links);
    }

 
    public function create()
    {
        //create new link

        $domains = Domain::pluck('name', 'id');
        $selectedDomain = 2;
        $ads=AdsTypes::pluck('name', 'id');
        $selectedAds =1;

        return view('users.links.create',compact('domains','selectedDomain','ads','selectedAds'));
    }

    public function store(LinkValidation $request)
    {
        //build link
      $this->NewItem($request->all());

      return redirect()->route('links.index')->with(['message'=>$request->title .
        ' Sucessfully Created :)']);
    }

    public function show(link $link)
    {
        // show link details
    }

    public function edit(link $link)
    {
        // edit link details
       return view('users.links.edit');
    }

    
    public function update(Request $request, link $link)
    {
        // update function
    }

    public function destroy(link $link)
    {
        // for hide link 
          return redirect()->back();
    }
    public function delete(link $link)
    {
        // for delete link 
          return redirect()->back();
    }

    /*
    |------------------------
    |  private Functions
    |------------------------
    */
    private function deleteForm()
    {
        return array ('url' => 'user/links/destroy',
                               'method'  => 'delete',
                               'class'  => 'form-delete'  ,
                               'id'  => 'form-delete' );
    }
     private function editForm()
    {
        return array ('url' => 'user/links/update',
                               'method'  => 'Post',
                               'class'  => 'form-edit'  ,
                               'id'  => 'form-edit' );
    }
  // NewItemew for create new item in table(for calling in store).
    protected function NewItem(array $data)
    {
     return link::create(
        [
          'user_id'    => Auth::id(),
          'domain_id'  => $data['domain_id'],
          'ad_id'      => $data['ad_id'],
          'alias'      => $data['alias'],
          'status'     => $data['status'],
          'url'        => $data['url'],
          'description'=> $data['description'],
          'hits'       => $data['hits'],
        ]);
    }
}
