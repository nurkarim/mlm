<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Models\ReferralCommission;
use App\Models\AddFundsWallet;
use App\Models\Withdrawal;
class DashboardController extends Controller
{
    public function dashboard()
    {
        $sumComission=ReferralCommission::where('user_id',Auth::id())->sum('amount');
        $funds=AddFundsWallet::where('user_id',Auth::id())->orderBy('id','DESC')->limit(10)->get();
        $data=Withdrawal::where('user_id',Auth::id())->limit(10)->get();
    	return view('user._partials.app',compact('sumComission','funds','data'));
    }

    public function genealogy()
    {
    	$users=User::where('placement_id',Auth::id())->get();
    	$user=User::find(Auth::id());
    	return view('user.tree.index',compact('users','user'));
    }

    public function genealogyNext($id)
    {
    	$users=User::where('placement_id',$id)->get();
    	$user=User::find($id);
    	return view('user.tree.index',compact('users','user'));
    }
}
