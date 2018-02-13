<?php

namespace App\Http\Controllers\Users;

use App\Http\Models\folder;
use Illuminate\Http\Request;
use App\Http\Requests\FolderValidation;
use App\Http\Controllers\Controller;
use Auth;
use Session;
class FolderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(folder $folder)
    {
        $folders = $folder->folder()->paginate(20);
        return view('users.folders.index')->withfolder($folders);
    }
  
    public function create()
    {
        return view('users.folders.Form');
    }

  
    public function store(FolderValidation $request)
    {
        $this>NewItem($request->all());
        Session::flash('success' , 'Sucessfully has been created the ' .$request->name .' folder :)');
     
       return redirect()->route('folder.index');
    }


   
// show folder details
public function show(folder $folder)
{
    return view('users.folders.show',compact('folder'));
}
// edit folder details
public function edit(folder $folder)
{
    return view('users.folders.Form',compact('folder'));
}
// update function
public function update(Request $request, folder $folder)
{    
    Session::flash('success' , 'Sucessfully has been edited the ' .$request->name .' folder :)');
    return redirect()->route('folders.index');
}
// for hide folder    
public function destroy(folder $folder)
{

    Session::flash('success' , 'Sucessfully has been hided the ' .$folder->name .' folder :)');
    return redirect()->route('folders.index');
}
// for delete folder
public function delete(folder $folder)
{
    $name= $folder->name;
    Session::flash('success' , 'Sucessfully has been deleted the ' .$name .' folder :)');
    return redirect()->route('folders.index');
}

// NewItemew for create new item in table(for calling in store).
protected function NewItem(array $data)
{ 
   $Folders = folder::create(
    [
        'name'  => $data['name'],
        'user_id'  => Auth::id(),
    ]);
     
 return $Folders ;
}

}
