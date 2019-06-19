<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Mail\ApprovedAccount;
use App\Models\ReferralCommission;
use Maatwebsite\Excel\Facades\Excel;
use Auth;
use DB;
use Mail;
class MemberController extends Controller
{

     public function export() 
    {
         $data = User::get();
                 Excel::create('users', function ($excel) use ($data) {
                 $excel->sheet("userList", function ($sheet) use ($data) {
                            $sheet->loadView("admin.members.export")
                            ->with('data', $data);
                            $sheet->setFontFamily('Arial');
                            $sheet->setAutoSize(true);
                            
                        });
            
        })->download();
    }

    public function genealogy($slug)
    {
        $usr=User::where('user_name',$slug)->first();
        $users=User::where('placement_id',$usr->id)->get();
        $user=User::find($usr->id);
        return view('admin.tree.index',compact('users','user'));
    }

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
        $commissions=ReferralCommission::where('user_id',$id)->get();
    	return view('admin.members.show',compact('user','commissions'));
    }

    public function action($id)
    {
        $user=User::find($id);
        return view('admin.members.action',compact('user'));
    }

    public function update(Request $request)
    {
        try {
        DB::beginTransaction();
        $user=User::find($request->id);
        $user->status=$request->status;
        $user->save();
        $data=[
                'name'=>$user->name,
                'slug'=>$user->user_name,
                'approve_date'=>date('Y-m-d'),
            ];
        Mail::to($user->email)->send(new ApprovedAccount($data));
        $request->session()->flash('success', 'Approved successfully');
        DB::commit(); 
        return back();
        } catch (Exception $e) {
            $request->session()->flash('error', 'sorry!something was wrong.');
            return back();
        }
    }

    public function updateAll()
    {
        $users=User::where('status',0)->get();
        foreach ($users as $user) {
            $user->status=1;
            $user->save();
        }
        return back();
    }


}
