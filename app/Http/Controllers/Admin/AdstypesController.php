<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Adstype;
use Illuminate\Http\Request;
use App\Http\Requests\AdstypeValidation;
use App\Http\Controllers\Controller;
use Session;

class AdstypesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(Adstype $adstype)
    {
        $Adstypes = $adstype->Adstypes()->paginate(20);
        return view('admin.adstypes.index')->withAdstypes($Adstypes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.adstypes.Form');
    }

    public function store(AdstypeValidation $request)
    {
        $this->NewItem($request->all());

        Session::flash('success',' Sucessfully created the ' .$request->name . ' Ads Type .');
        return redirect()->route('adstypes.index');
    }

   
        
    // show adstype details
    public function show(Adstype $adstype)
    {
        return view('admin.adstypes.show',compact('adstype'));
    }
    // edit adstype details
    public function edit(Adstype $adstype)
    {
        return view('admin.adstypes.Form',compact('adstype'));
    }
    // update function
    public function update(Request $request, Adstype $adstype)
    {  
       
        $adstype->name =$request->name;
        $adstype->description =$request->description;
        $adstype->save();
        Session::flash('success',' Sucessfully updated the ' .$request->name . ' Ads Type .');
        return redirect()->route('adstypes.index');

    }
    // for delete adstype    
    public function destroy(Adstype $adstype)
    {   
        $name= $adstype->name;
        $adstype = Adstype::find($adstype)->first();
        $adstype->delete();
        Session::flash('success',' Sucessfully deleted the ' .$name . ' Ads Type .');
        return redirect()->route('adstypes.index');
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
