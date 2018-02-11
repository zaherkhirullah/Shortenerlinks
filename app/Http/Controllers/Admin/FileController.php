<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\file;
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
// Show list of files
    public function index(file $file)
    {
        $files = $file->files()->paginate(20);
        return view('admin.files.index')->withFiles($files);
    }
// Show list of deleted files
    public function deletedFiles(file $file)
    {  $files = $file->deletedFiles()->paginate(20);
        return view('admin.files.index')->withFiles($files);
    }

// Show list of private files
    public function private(file $file)
    {
        $files = $file->private()->paginate(20);
        return view('admin.files.index')->withFiles($files);
    }
// Show list of public files
    public function public(file $file)
    {
        $files = $file->public()->paginate(20);
        return view('admin.files.index')->withFiles($files);
     }
// upload new file
    public function create()
    {  
    $domains = Domain::pluck('name', 'id');
        $selectedDomain = 1;
        $ads=Adstype::pluck('name', 'id');
        $selectedAds =1;
        $files=file::pluck('name', 'id');
        $selectedfile =1;

        return view('admin.files.Form',compact('domains','selectedDomain','files','selectedfile','ads','selectedAds'));
    }
// build file
        public function store(FileValidation $request)
        { 
        $this->NewItem($request->all());

        return redirect()->route('files.index')->
                with( ['message'=>' Sucessfully Created :)']);
        }

// show file details
    public function show(file $file)
    {
        return view('admin.files.show',compact('file'));
    }
    // edit file details
    public function edit(file $file)
    {
        return view('admin.files.Form',compact('file'));
    }
    // update function
    public function update(Request $request, file $file)
    {    
        return redirect()->route('files.index')->with( ['success'=>' Sucessfully Edited :)']);
    }
    // for hide file    
    public function destroy(file $file)
    {
        return redirect()->route('files.index')->with( ['success'=>' Sucessfully hided :)']);
    }
    // for delete file
    public function delete(file $file)
    {
        return redirect()->route('files.index')->with( ['success'=>' Sucessfully deleted :)']);
    }

    // NewItemew for create new item in table(for calling in store).
    protected function NewItem(array $data)
    {
        $domain_id = $data['domain_id'];
        $file_id = $data['file_id'];
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
            'file_id'  => $file_id,
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
