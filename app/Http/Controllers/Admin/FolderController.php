<?php
namespace App\Http\Controllers\Admin;

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
        $this->middleware('admin');
    }

    public function index(folder $folder)
    {
        $folders = $folder->folders()->paginate(20);
        return view('admin.folders.index')->withFolders($folders);
    }
   // Show list of deleted links
   public function deletedFolders(folder $folder)
   {
         $folders = $folder->deletedFolders()->paginate(20);
         return view('admin.folders.index',compact('folders'));
   }
    public function create()
    {
        return view('admin.folders.Form');
    }

    public function store(FolderValidation $request)
    {  
        $this->NewItem($request->all());
        Session::flash('success',' Sucessfully Created the ' .$request->name . ' folder .');
        return redirect()->route('folders.index');
    }

    // show folder details
    public function show(folder $folder)
    {
        return view('admin.folders.show',compact('folder'));
    }
    // edit folder details
    public function edit(folder $folder)
    {
        return view('admin.folders.Form',compact('folder'));
    }
    // update function
    public function update(FolderValidation $request, folder $folder)
    {    $folder ->update($request->all());
         $folder->save();
        Session::flash('success',' Sucessfully Updated the ' .$request->name . ' folder .');
        return redirect()->route('folders.index');
    }
    // for hide folder    
    public function destroy(folder $folder)
    {   $name =$folder->name;
        $folder = folder::find($folder)->first();
        $folder->delete();
        Session::flash('success',' Sucessfully deleted the ' .$name . ' folder .');
        return redirect()->route('folders.index');
    }
    // for delete folder
    public function delete(folder $folder)
    {
        Session::flash('success',' Sucessfully Hided the ' .$request->name . ' folder .');
        return redirect()->route('folders.index');
    }

    // NewItemew for create new item in table(for calling in store).
    protected function NewItem(array $data)
    { 
        return folder::create(
        [
            'name'  => $data['name'],
            'user_id'  => Auth::id(),
        ]);
    }

}
