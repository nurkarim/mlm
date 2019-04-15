<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FundTransfer;
use App\Models\Transaction;
use App\User;
use DB;
use Auth;
class FundsTransferController extends Controller
{
    public function create()
    {
    	return view('user.fundTransfer.create');
    }

    public function index()
    {
        $data=FundTransfer::where('user_id',Auth::id())->get();
        return view('user.fundTransfer.index',compact('data'));
    }

    public function store(Request $request)
    {
    	 try {
             DB::beginTransaction();
             $user=User::where('user_name',$request->user_name)->first();
             if (!$user) {
             	$request->session()->flash('error', 'Sorry! username not found.Please provide valid username');
                return back();
             }
             if (Auth::user()->funds_amount < $request->amount) {
             	$request->session()->flash('error', 'Sorry!transfer amount large from funds wallet amount.');
                return back();
             }
             $save=FundTransfer::create([
             	'remark'=>$request->note,
             	'amount'=>$request->amount,
             	'user_id'=>Auth::id(),
             	'to_user_id'=>$user->id,
             ]);

             if ($save) {
             	Auth::user()->decrement('funds_amount', $request->amount);
             	$updateFunds=User::find($user->id);
             	$updateFunds->funds_amount=$user->funds_amount+$request->amount;
             	$updateFunds->save();

                 Transaction::create([
                    'user_id'=>Auth::id(),
                    'type'=>5,
                    'note'=>'Funds transfer',
                    'amount'=>$request->amount,
                    'total'=>$request->amount,
                    'from'=>'Funds Wallet',
                    'to'=>$user->user_name,
                    'status'=>1,
                    ]);

                  Transaction::create([
                    'user_id'=>$user->id,
                    'type'=>2,
                    'note'=>'Received transfer funds amount',
                    'amount'=>$request->amount,
                    'total'=>$request->amount,
                    'from'=>Auth::user()->user_name,
                    'to'=>'Funds Wallet',
                    'status'=>1,
                    ]);


             	$request->session()->flash('success', 'Funds transfer successfully.');
             }else{
             	$request->session()->flash('error', 'Sorry! funds transfer unsuccessfully.');

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
