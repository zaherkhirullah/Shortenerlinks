<?php

namespace App\Http\Controllers;

use App\Http\Models\file;
use App\Http\Models\folders;
use App\Http\Models\Domain;
use App\Http\Models\AdsTypes;
use Illuminate\Http\Request;
use App\Http\Requests\FileValidation;

class fileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(file $file)
    {
        // Show list of files
          $files = $file->files()->paginate(20);
          $deleteform = $this->deleteForm();

     return view('users.files.index',compact('deleteform'))->withFiles($files);
    }
// upload new file
    public function create()
    {   $domains = Domain::pluck('name', 'id');
        $selectedDomain = 2;
        $ads=AdsTypes::pluck('name', 'id');
        $selectedAds =1;
        $folders=folders::pluck('name', 'id');
        $selectedfolder =1;

        return view('users.files.create',compact('domains','selectedDomain','folders','selectedfolder','ads','selectedAds'));
    }
// build file
    public function store(FileValidation $request)
    { 
      $this->NewItem($request->all());
      return redirect()->route('links.index')->
              with( ['message'=> $request->title.' Sucessfully Created :)']);
    }
// show file details
    public function show(file $file)
    {
    }
// edit file details
    public function edit(file $file)
    {
        
         return view('users.files.edit');
    }
 // update function
    public function update(Request $request, file $file)
    {    
    }
// for hide file    
    public function destroy(file $file)
    {
  
    }
// for delete file
    public function delete(file $file)
    {
 
    }

/*
|------------------------
|  private Functions
|------------------------
*/
    private function deleteForm()
    {
        return array ('url' => 'user/files/destroy',
                               'method'  => 'delete',
                               'class'  => 'form-delete',
                               'id'  => 'form-delete' );
    }
    private function editForm()
    {
        return array ('url' => 'user/files/update',
                               'method'  => 'Post',
                               'class'  => 'form-edit'  ,
                               'id'  => 'form-edit' );
    }
     // NewItemew for create new item in table(for calling in store).
    protected function NewItem(array $data)
    {
     return file::create(
        [
         'user_id'    =>  Auth::user()->id(),
         'domain_id'  => $data['domain_id'],
         'domain_id'  => $data['folder_id'],
         'slug'        => $data['slug'],
         'path'        => $data['path'],

         'title'      => $data['title'],
         'description'=> $data['description'],
        ]);
     
    }
}
