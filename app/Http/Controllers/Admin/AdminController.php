<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\AddFundsWallet;
use App\Models\Transaction;
use App\Models\Withdrawal;
class AdminController extends Controller
{
    public function dashboard()
    {
    	$activeMember=User::where('status',1)->count();
    	$inactiveMember=User::where('status',0)->count();
    	$users=User::where('status',0)->where('user_type','!=',0)->get();
    	$twithdrawal=Withdrawal::where('status',1)->sum('total');
    	$withdrawals=Withdrawal::where('status',0)->get();
        return view('admin._partials.app',compact('activeMember','inactiveMember','twithdrawal','users','withdrawals'));
    }
}
