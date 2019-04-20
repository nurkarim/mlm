<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Withdrawal;
use App\Models\Transaction;
use App\Mail\WithdrawalApproved;
use App\Mail\WithdrawalReturn;
use Auth;
use DB;
use Mail;
class WithdrawalController extends Controller
{
    public function edit($id)
    {
    	$withdrawal=Withdrawal::find($id);
    	return view('admin.withdrawal.edit',compact('withdrawal'));
    }

    public function update($id,Request $request)
    {
    	try {
             DB::beginTransaction();
    		$update=Withdrawal::find($id);
    		$update->status=$request->status;
    		$update->save();
    		if ($update->status==1) {
    		Transaction::create([
                    'user_id'=>$update->user_id,
                    'type'=>5,
                    'note'=>'Withdrawal Approved',
                    'amount'=>$update->amount,
                    'fee'=>$update->fee,
                    'total'=>$update->total,
                    'from'=>'Wallet',
                    'to'=>'Admin',
                    'status'=>1,
                    ]);
    		$data=[
                'name'=>$update->user->name,
                'user_name'=>$update->user->user_name,
                'date'=>date('Y-m-d'),
                'updated_at'=>$update->updated_at,
                'amount'=>$update->amount,
                'fee'=>$update->fee,
                'total'=>$update->total,
                'wallet_address'=>$update->wallet_address,
            ];
            Mail::to($update->user->email)->send(new WithdrawalApproved($data));

    	   
            $request->session()->flash('success', "Status change successfully");
             }elseif($update->status==2){
                Transaction::create([
                    'user_id'=>$update->user_id,
                    'type'=>2,
                    'note'=>'Withdrawal cancel and return amount into wallet',
                    'amount'=>$update->amount,
                    'fee'=>0,
                    'total'=>$update->amount,
                    'from'=>'Admin',
                    'to'=>'Wallet',
                    'status'=>1,
                    ]);
    		    
    		    $data=[
                'name'=>$update->user->name,
                'user_name'=>$update->user->user_name,
                'date'=>date('Y-m-d'),
                'updated_at'=>$update->updated_at,
                'amount'=>$update->amount,
                'fee'=>$update->fee,
                'total'=>$update->total,
                'wallet_address'=>$update->wallet_address,
               ];
               
              Mail::to($update->user->email)->send(new WithdrawalReturn($data));
              $request->session()->flash('success', "Status change successfully");
             }else{
                $request->session()->flash('error', "Status change unsuccessfully");
             }

             DB::commit();
            return back();
            } catch (Exception $e) {
            DB::rollback();
            $request->session()->flash('error', 'Something wrong!');
            return back(); 
        }
    }
}
