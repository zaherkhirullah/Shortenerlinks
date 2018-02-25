<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\withdraw;
use App\Http\Models\PayMethod;
use App\Http\Controllers\Controller;

use App\Balance;

use Illuminate\Http\Request;
use App\Http\Requests\WithdrawValidation;
use Session;
use Auth;

class WithdrawsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
   
    public function index(withdraw $withdraw)
    {
          $withdraws = $withdraw->Withdraws()->paginate(20);
          return view('admin.withdraws.index ',compact('withdraws'));
    }
    public function deletedWithdraws(withdraw $withdraw)
    {
          $withdraws = $withdraw->deletedWithdraws()->paginate(20);
          return view('admin.withdraws.index ',compact('withdraws'));
    }
    public function create()
    {
        return view('admin.withdraws.Form');
    }

  
    public function store(withdrawValidation $request)
    {
        $this>NewItem($request->all());
        $ticket->save();
        Session::flash('success' , 'Sucessfully has been created the ' .$request->name .' withdraw :)');
     
       return redirect()->route('withdraws.index');
    }
    
    // show withdraw details
    public function show(withdraw $withdraw)
    {
        return view('admin.withdraws.show',compact('withdraw'));
    }
    // edit withdraw details
    public function edit(withdraw $withdraw)
    {
        return view('admin.withdraws.Form',compact('withdraw'));
    }
    // update function
    public function update(Request $request, withdraw $withdraw)
    {    
        if($request->status == 3 && $request->transaction_id ==null){
            Session::flash('error' , 'must be input  transiction number for paid   ' .$request->name .' proccess :(');
            return redirect()->route('withdraws.index');
        
        }
         $withdraw->transaction_id = $request->transaction_id;
         $withdraw->save();
        $withdraw->update($request->all());
        
        Session::flash('success' , 'Sucessfully has been edited the ' .$request->name .' withdraw :)');
        return redirect()->route('withdraws.index');
    }
    // for hide withdraw    
    public function destroy(withdraw $withdraw)
    {

        Session::flash('success' , 'Sucessfully has been hided the ' .$withdraw->name .' withdraw :)');
        return redirect()->route('withdraws.index');
    }
    // for delete withdraw
    public function delete(withdraw $withdraw)
    {
        $name= $withdraw->name;
        Session::flash('success' , 'Sucessfully has been deleted the ' .$name .' withdraw :)');
        return redirect()->route('withdraws.index');
    }

    // NewItemew for create new item in table(for calling in store).
  protected function NewItem(array $data)
  {   
       $user_id  = Auth::id();
       $amount = $data['amount'];
       $withdrawal_method_id = $data['withdrawal_method_id'];
       $Balance = Balance::where(['user_id',$user_id ])->first();
       $payMethod = PayMethod::find($withdrawal_method_id)->first();
       $payMethod_min_amount = $payMethod->min_amount;
        $avilableBalance = $Balance->avilable_amount;
    //  if($amount>$avilableBalance || $amount < $payMethod_min_amount ||$amount <= 0)
    //  {
        if($amount>$avilableBalance)
        return   Session::flash('error','  The Withdraw amount must be equal or a little then avilableBalance ' .$avilableBalance . ' to withdraw your money .');
        if($amount <= 0)
        return   Session::flash('error','  The Withdraw amount must be big than zero you are wanted (' .$amount . ') to withdraw your money .');
        if($amount < $payMethod_min_amount)
        return    Session::flash('error','  The Withdraw amount must be at least  ' .$payMethod_min_amount . ' to successful create withdraw process.');
    
    //  }
    //   else{
        $withdraw = withdraw::create(
            [
              'user_id'    => $user_id,
              'amount'  => $amount,
              'withdrawal_method_id'  => $data['withdrawal_method_id'],
              'withdraw_address'      => $data['withdraw_address'],
            ]);
            Session::flash('success',' Sucessfully created the ' .$amount . ' link .');
  
    //   }
  return $withdraw ;
  }
  
}
