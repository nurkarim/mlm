<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\PasswordChange;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\AddFundsWallet;
use App\Models\Transaction;
use App\Models\Withdrawal;
use Auth;
use DB;
use Hash;
class AdminController extends Controller
{
    public function dashboard()
    {
    	$total_funds=User::sum('funds_amount');
      $activeMember=User::where('status',1)->where('user_type','!=',0)->count();
    	$inactiveMember=User::where('status',0)->where('user_type','!=',0)->count();
    	$users=User::where('status',0)->where('user_type','!=',0)->get();
    	$twithdrawal=Withdrawal::where('status',1)->sum('total');
    	$withdrawals=Withdrawal::where('status',0)->get();
        return view('admin._partials.app',compact('activeMember','inactiveMember','twithdrawal','users','withdrawals','total_funds'));
    }

    public function profile()
    {
    	return view('admin.settings.profile');
    } 
    public function passwordChange()
    {
    	return view('admin.settings.password');
    }

    public function save(Request $request)
    {
    	 try {
             DB::beginTransaction();
              if ($request->hasFile('image')) {
                    $fileScan = $request->file('image');
                    $picturea = time() . rand(10000, 99999);
                    $paths = public_path() . '/users';
                    $cover = Helper::imageUpload($fileScan, $picturea, $paths);
                    } else {
                    $cover = Auth::user()->image;
             } 
             $user=User::where('id',Auth::id());
             $user->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'city'=>$request->city,
                'country'=>$request->country,
                'address'=>$request->address,
                'image'=>$cover,
             ]);
             
            $request->session()->flash('success', 'Profile update successfully');
            DB::commit(); 
           return back();
        } catch (Exception $e) {
            $request->session()->flash('error', 'sorry!something was wrong.');
            return back();
        }
    }

    public function passwordChangeSave(PasswordChange $request)
    {
        try {
             DB::beginTransaction();
              
             $user=User::find(Auth::id());
            if (Hash::check($request->password_old, $user->password)) { 
            
            $user->password=bcrypt($request->password);
            $user->hidden_key=$request->password;
            $user->save();
             $request->session()->flash('success', 'Password update successfully');
             }else{
              $request->session()->flash('error', 'Previous password does not match');
          }
            DB::commit(); 
           return back();
        } catch (Exception $e) {
            $request->session()->flash('error', 'sorry!something was wrong.');
            return back();
        }
    }
}
