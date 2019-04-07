<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
class DashboardController extends Controller
{
    public function dashboard()
    {
    	return view('user._partials.app');
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
