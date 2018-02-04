<?php

namespace App\Http\Controllers;

use App\file;
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
    {
      return view('users.files.create');
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
         'status'     => $data['status'],
         'url'        => $data['url'],
         'title'      => $data['title'],
         'description'=> $data['description'],
         'hits'       => $data['hits'],
        ]);
     
    }
}
