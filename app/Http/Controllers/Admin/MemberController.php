<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class MemberController extends Controller
{
    public function index()
    {
    	$users=User::where('user_type',1)->where('status',1)->get();
    	return view('admin.members.index',compact('users'));
    }

    public function inActiveUser()
    {
    	$users=User::where('user_type',1)->where('status',0)->get();
    	return view('admin.members.inactive',compact('users'));
    }

    public function show($id)
    {
    	$user=User::find($id);
    	return view('admin.members.show',compact('user'));
    }
}
