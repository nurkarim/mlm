<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\AddFundsWallet;
use App\Models\Transaction;
use App\Models\Discount;
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
        $data=Discount::where('user_id',Auth::id())->get();
        return view('user.discounts.index',compact('data'));
    }
}
