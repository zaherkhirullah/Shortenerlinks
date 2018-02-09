<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\AdsTypes;
use Illuminate\Http\Request;
use App\Http\Requests\AdsTypesValidation;
use App\Http\Controllers\Controller;

class AdsTypesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(AdsTypes $adstypes)
    {
        $adstypes = $adstypes->AdsTypes()->paginate(20);
        return view('admin.adstypes.index')->withAdstypes($adstypes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.adstypes.create');
    }

    public function store(AdsTypesValidation $request)
    {
        $this->NewItem($request->all());

        return redirect()->route('adstypes.index')
        ->with(['success'=>$request->name .' Sucessfully Created :)']);
    }

   
    public function show(AdsTypes $adsTypes)
    {
        //
    }

    
    public function edit(AdsTypes $adsTypes)
    {
        //
    }

    
    public function update(Request $request, AdsTypes $adsTypes)
    {
        //
    }

    
    public function destroy(AdsTypes $adsTypes)
    {
        //
    }



// NewItemew for create new item in table(for calling in store).
protected function NewItem(array $data)
{ 
   $AdsTypes = AdsTypes::create(
    [
        'name'  => $data['name'],
        'description'   => $data['description'],
    ]);
     
 return $AdsTypes ;
}


}
