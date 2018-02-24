<?php

namespace App\Http\Controllers\Users;

use App\Http\Models\withdraw;
use App\Http\Models\PayMethod;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\WithdrawValidation;

use App\Balance;
use Session;
use Auth;

class WithdrawController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(withdraw $withdraw)
    {
        $User= Auth::user();
        $Balance=  $User->Balance->avilable_amount;        
        $method_id = $User->profile->withdrawal_method_id;
        $method = PayMethod::where('id',$method_id)->first();
        $PaymentMethod = $method->name;

        $withdraws = $withdraw->Withdraws()->paginate(20);
        return view('users.withdraws.index ',compact('withdraws','PaymentMethod','Balance') );
   
          $withdraws = $withdraw->Withdraws()->paginate(20);
          return view('users.withdraws.index ',compact('withdraws'));
    }
    public function deletedWithdraws(withdraw $withdraw)
    {
          $withdraws = $withdraw->deletedWithdraws()->paginate(20);
          return view('users.withdraws.index ',compact('withdraws'));
    }
    public function create()
    {
        return view('users.withdraws.Form');
    }
    public function store(withdrawValidation $request )
    {
        $this->NewItem($request->all());
        // Session::flash('success' , 'Sucessfully has been created the ' .$request->name .' withdraw :)');
       return redirect()->route('withdraw.index');
    }
    
    // show withdraw details
    public function show(withdraw $withdraw)
    {
        return view('users.withdraws.show',compact('withdraw'));
    }
    // edit withdraw details
    public function edit(withdraw $withdraw)
    {
        return view('users.withdraws.Form',compact('withdraw'));
    }
    // update function
    public function update(Request $request, withdraw $withdraw)
    {    
        $withdraw->update($request->all());
        Session::flash('success' , 'Sucessfully has been edited the ' .$request->name .' withdraw :)');
        return redirect()->route('withdraw.index');
    }
    // for hide withdraw    
    public function destroy(withdraw $withdraw)
    {
        $amount =  $withdraw->amount;
        if( $withdraw->delete()){
            $Balance = Balance::where('user_id',Auth::id() )->first();
            $Balance->avilable_amount += $amount;
            $Balance->save();
        }

        Session::flash('success' , 'Sucessfully has been hided the ' .$withdraw->amount .' withdraw :)');
        return redirect()->route('withdraw.index');
    }
    // for delete withdraw
    public function delete(withdraw $withdraw)
    {
        $name= $withdraw->amount;
        Session::flash('success' , 'Sucessfully has been deleted the ' .$amount .' withdraw :)');
        return redirect()->route('withdraw.index');
    }

    // NewItemew for create new item in table(for calling in store).
  protected function NewItem(array $data)
  {   
       $user_id  = Auth::id();
       $User  = Auth::user();
       $amount = $data['amount'];
       $withdrawal_method_id = $User->profile->withdrawal_method_id;
    //    $withdrawal_method_id = $data['withdrawal_method_id'];
        $Balance = Balance::where('user_id',$user_id )->first();
        $payMethod = PayMethod::find($withdrawal_method_id)->first();
        $payMethod_min_amount = $payMethod->min_amount;
        $avilableBalance = $Balance->avilable_amount;
    //  if($amount>$avilableBalance || $amount < $payMethod_min_amount ||$amount <= 0)
    //  {
        if($amount > $avilableBalance)
        return   Session::flash('error','  The Withdraw amount must be little then and must be big than zero  avilableBalance ' .$avilableBalance . ' to withdraw your money .');
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
              'status'  => 1,
              'withdrawal_method_id'  => $withdrawal_method_id,
              'withdraw_address'      => $data['withdraw_address'],
            ]);
            Session::flash('success',' Sucessfully created your request (' .$amount . ') and Pending we will return message on email  .');
    if($withdraw)
    {
        $Balance->avilable_amount -= $amount;
        $Balance->save();
    }
            //   }
    return $withdraw ;
  }
  
}
