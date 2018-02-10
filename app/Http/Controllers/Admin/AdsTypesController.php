<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Adstype;
use Illuminate\Http\Request;
use App\Http\Requests\AdstypeValidation;
use App\Http\Controllers\Controller;

class AdstypesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Adstype $Adstype)
    {
        $Adstypes = $Adstype->Adstypes()->paginate(20);
        return view('admin.Adstypes.index')->withAdstypes($Adstypes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Adstypes.Form');
    }

    public function store(AdstypeValidation $request)
    {
        $this->NewItem($request->all());

        return redirect()->route('Adstypes.index')
        ->with(['success'=>$request->name .' Sucessfully Created :)']);
    }

   
    public function show(Adstype $Adstype)
    {
        //
    }

    
    public function edit(Adstype $Adstype)
    {
        //
    }

    
    public function update(Request $request, Adstype $Adstype)
    {
        //
    }

    
    public function destroy(Adstype $Adstype)
    {
        //
    }



// NewItemew for create new item in table(for calling in store).
protected function NewItem(array $data)
{ 
   $Adstypes = Adstype::create(
    [
        'name'  => $data['name'],
        'description'   => $data['description'],
    ]);
     
 return $Adstypes ;
}


}
