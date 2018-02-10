<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\file;
use App\Http\Models\folder;
use App\Http\Models\Domain;
use App\Http\Models\Adstype;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests\FileValidation;
use Auth;
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
     return view('admin.files.index')->withFiles($files);
    }
    public function deleteFiles(file $file)
    {
        // Show list of files
          $files = $file->deleteFiles()->paginate(20);
     return view('admin.files.index')->withFiles($files);
    }
// upload new file
    public function create()
    {  
     $domains = Domain::pluck('name', 'id');
        $selectedDomain = 1;
        $ads=Adstype::pluck('name', 'id');
        $selectedAds =1;
        $folders=folder::pluck('name', 'id');
        $selectedfolder =1;

        return view('admin.files.Form',compact('domains','selectedDomain','folders','selectedfolder','ads','selectedAds'));
    }
// build file
    public function store(FileValidation $request)
    { 
      $this->NewItem($request->all());

      return redirect()->route('files.index')->
              with( ['message'=>' Sucessfully Created :)']);
    }

// show folder details
public function show(folder $folder)
{
    return view('admin.folders.show');
}
// edit folder details
public function edit(folder $folder)
{
    return view('admin.folders.Form');
}
// update function
public function update(Request $request, folder $folder)
{    
    return redirect()->route('folders.index')->with( ['success'=>' Sucessfully Edited :)']);
}
// for hide folder    
public function destroy(folder $folder)
{
    return redirect()->route('folders.index')->with( ['success'=>' Sucessfully hided :)']);
}
// for delete folder
public function delete(folder $folder)
{
    return redirect()->route('folders.index')->with( ['success'=>' Sucessfully deleted :)']);
}

     // NewItemew for create new item in table(for calling in store).
     protected function NewItem(array $data)
     {
         $domain_id = $data['domain_id'];
         $folder_id = $data['folder_id'];
         $path = $data['path'];
         $title=($data['title'])?: null;
         $slug =($data['title'])?: str_random(7);
         if($path !=null)
         {
             $file_name='file_' . $slug .'_'.time() . '.' . $path->getClientOriginalExtension();
             $destination_path ='uploads/files/';
             $I_path=   $path->move($destination_path, $file_name);
         }
        $domain = Domain::find($domain_id);
        $shorted_url =($domain_id ==1)?url('/'. $slug) : $domain->url .'/'. $slug;
        $UserId = Auth::id();
         
      return file::create(
         [
          'user_id'    => $UserId ,
          'domain_id'  => $domain_id,
          'folder_id'  => $folder_id,
          'slug'       => $slug ,
          'title'      => $title,
          'description'=> $data['description'],
          'path'       => $I_path,
          'isPrivate'  => $data['isPrivate'],
          'password'   => $data['password'],
          'shorted_url' =>$shorted_url ,
         ]);
     }

}
