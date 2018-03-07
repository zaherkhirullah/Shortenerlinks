<?php

namespace App\Http\Controllers\Users;

use App\Http\Models\file;
use App\Http\Models\folder;
use App\Http\Models\Domain;
use App\Http\Models\Adstype;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests\FileValidation;
use Auth;
use Session;
class fileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
  // Show list of files   
    public function index(file $file)
    {
          $files = $file->UserFiles()->paginate(20);
        //   foreach($files as $file){
        //     $size =$file->path ;
        //     $size= Storage::size($size);
        //     // $size =file()->getClientSize();
        //     dd($size);
        //   }
         
          return view('users.files.index',compact('files'));
    }
// Show list of deleted files
     public function deletedFiles(file $file)
     {
           $files = $file->UserDeletedFiles()->paginate(20);
           return view('users.files.index',compact('files'));
     }
// upload new file
    public function create()
    {  
        $domains = Domain::pluck('name', 'id');
        $ads=Adstype::pluck('name', 'id');
        $folders=folder::pluck('name', 'id');

        return view('users.files.Form',compact('domains','folders','ads'));
    }
// build file
    public function store(FileValidation $request)
    { 
      $this->NewItem($request->all());
      return redirect()->route('file.index');
    }
// show file details
      public function show(file $file)
      {
          return view('users.files.show',compact('file'));
      }
// edit file details
      public function edit(file $file)
      {
         $domains = Domain::pluck('name', 'id');
         $ads=Adstype::pluck('name', 'id');
         $folders=folder::pluck('name', 'id');
        return view('users.files.Form',compact('domains','folders','ads'))->withfile($file);
  
      }

// update function
public function update(Request $request, file $file)
{  
    $domain = Domain::find($request->domain_id);
   
    $dattitle=($request->title)?: null;
    $slug =($request->title)?: str_random(10);
    $shorted_url =( $request->domain_id ==1)? url('/f/'.  $slug ) : $domain->url .'/f/'. $slug;
    
    $file->update($request->all());
    if($file->slug != $slug)
    $file->slug = $slug;
    else; 
    $file->shorted_url = $shorted_url;

    if($file->save())
    Session::flash('success',' Sucessfully updated the ' .$slug . ' file .');
    return redirect()->route('file.index');

}
// for hide file    
    public function destroy(file $file)
    {
    return $this->Deleteate($file , 1);
    }
 // for unhide file    
    public function restore(file $file)
    {
    return $this->Deleteate($file , 0);
    }
 
// for delete file
    public function delete(file $file)
    {
        Session::flash('success',' Sucessfully deleted the ' .$file->slug . ' file .');
        return redirect()->route('file.index');
    }

    protected function upload_file($file  = null ,$path = null,$filename=null)
    {
        $filename = $filename ? $filename :'file';
        $path = $path ? $path :'uploads/files/';
        if(!empty($file)){
            $bytes = \File::size($file );
            $file_size =human_filesize($bytes);
            $file_name= $filename.'_'.time().'.'.$file ->getClientOriginalExtension();
            $file_path=   $file->move($path, $file_name);
            $array = array([
                 'file_path' => $file_path,
                 'file_name' => $file_name,
                 'file_size' => $file_size]);
            return $array;
           }
    }
 // NewItemew for create new item in table(for calling in store).
 protected function NewItem(array $data)
 {
           $domain_id = $data['domain_id'];
           $folder_id = $data['folder_id'];
           $path = $data['path'];
           $title=($data['title'])?: null;
           $slug =($data['title'])?: str_random(7);
           if(!empty($path))
           { 
            $upload_file = $this->upload_file($path,null,$slug );
             $file_name = $upload_file[0]['file_name'];             
             $file_path = $upload_file[0]['file_path'];
             $file_size = $upload_file[0]['file_size'];
           }
          $domain = Domain::find($domain_id);
          $shorted_url =($domain_id ==1)?url('/f/'. $slug) : $domain->url ."/f/". $slug;
          $UserId = Auth::id();
     $ip = \Request::ip();
     $ip =geoip($ip)->ip;
        $file = file::create(
           [
            'user_id'    => $UserId ,
            'domain_id'  => $domain_id,
            'folder_id'  => $folder_id,
            'slug'       => $slug ,
            'ip'         => $ip  ,
            'title'      => $title,
            'description'=> $data['description'],
            'file_name'  => $file_name,
            'path'       => $file_path,
            'size'       => $file_size,
            'isPrivate'  => $data['isPrivate'],
            'password'   => $data['password'],
            'shorted_url' =>$shorted_url ,
           ]);
           Session::flash('success',' Sucessfully created the ' .$slug . ' file .');
           return $file;
       }
 // Deleteate function For change isDeleted (To Active Or UnActive) Restore Or Delete Item in Database .
        Protected function Deleteate(file $file, $data)
         {
            $file = file::find($file->id);
            $isDeleted = $file->isDeleted;
            $Message = '';  $class = '';
             // Not Found Page
            if (is_null($file))
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
            $file->isDeleted = $data;
                if($file->save())
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
            return redirect()->route('file.index')->with([$class =>   $file->slug .  $Message]);
            }
        }

}
