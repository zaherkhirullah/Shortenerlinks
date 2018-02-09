<?php

namespace App\Http\Controllers\Users;

use App\Http\Models\folders;
use Illuminate\Http\Request;
use App\Http\Requests\FoldersValidation;
use App\Http\Controllers\Controller;
use Auth;

class FolderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(folders $folders)
    {
        $folders = $folders->folders()->paginate(20);
        return view('admin.folders.index')->withFolders($folders);
    }
  
    public function create()
    {
        return view('admin.folders.create');
    }

  
    public function store(FoldersValidation $request)
    {
        $this->NewItem($request->all());

        return redirect()->route('folders.index')
        ->with(['success'=>$request->name .' Sucessfully Created :)']);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\folders  $folders
     * @return \Illuminate\Http\Response
     */
    public function show(folders $folders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\folders  $folders
     * @return \Illuminate\Http\Response
     */
    public function edit(folders $folders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\folders  $folders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, folders $folders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\folders  $folders
     * @return \Illuminate\Http\Response
     */
    public function destroy(folders $folders)
    {
        //
    }

// NewItemew for create new item in table(for calling in store).
protected function NewItem(array $data)
{ 
   $Folder = folders::create(
    [
        'name'  => $data['name'],
        'user_id'  => Auth::id(),
    ]);
     
 return $Folder ;
}

}
