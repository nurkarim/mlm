<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Withdrawal;
use App\Mail\WithdrawalProcess;
use Auth;
use DB;
use Mail;
class WithdrawalController extends Controller
{
    public function index()
    {
        $data=Withdrawal::where('user_id',Auth::id())->get();
        return view('user.withdrawal.index',compact('data'));
    }

    public function create()
    {
        
        return view('user.withdrawal.create');
    }

    public function store(Request $request)
    {
    	try {
    		 DB::beginTransaction();
    		 $fee=(($request->amount*10)/100);
    		 $save=Withdrawal::create([
    		 	'user_id'=>Auth::id(),
    		 	'wallet_address'=>$request->wallet_address,
    		 	'remark'=>$request->note,
    		 	'available_balance'=>Auth::user()->wallet_amount,
    		 	'amount'=>$request->amount,
    		 	'fee'=>$fee,
    		 	'total'=>$request->amount-$fee,
    		 ]);
    		 if ( $save) {
    		 	Auth::user()->decrement('wallet_amount', $request->amount);
    		 	$request->session()->flash('success', 'Withdrawal process successfully');
    		 	$data=[
                'name'=>Auth::user()->name,
                'user_name'=>Auth::user()->user_name,
                'date'=>date('Y-m-d'),
                'updated_at'=>$save->updated_at,
                'amount'=>$save->amount,
                'fee'=>$fee,
                'total'=>$request->amount-$fee,
                'wallet_address'=>$request->wallet_address,
            ];
                 Mail::to(Auth::user()->email)->send(new WithdrawalProcess($data));
    		 }
            DB::commit(); 
           return back();
    	} catch (Exception $e) {
            DB::rollback();
    		$request->session()->flash('error', 'sorry!something was wrong.');
   	        return back();
    	}
    }
}
