<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\AddFundsWallet;
use App\Models\Transaction;
use App\Models\Discount;
use App\Models\ReferralCommission;
class HistroyController extends Controller
{
    public function fundsHistory()
    {
    	$funds=AddFundsWallet::where('user_id',Auth::id())->orderBy('id','DESC')->get();
    	return view('user.addFunds.index',compact('funds'));
    }

    public function transactionHistory()
    {
    	$data=Transaction::where('user_id',Auth::id())->orderBy('id','DESC')->get();
    	return view('user.transaction.index',compact('data'));
    }

    public function discounts()
    {
        $data=Discount::where('user_id',Auth::id())->orderBy('id','DESC')->get();
        return view('user.discounts.index',compact('data'));
    }

    public function commission()
    {
        $data=ReferralCommission::where('user_id',Auth::id())->orderBy('id','DESC')->get();
        return view('user.commission.index',compact('data'));
    }
}
