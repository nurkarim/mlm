<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Transaction;
use App\Mail\Notification;
use App\User;
use App\RequestCode;
use DB;
use Auth;
use Mail;
class DiscountConytroller extends Controller
{
    public function requestCodeEdit($id)
    {
    	$codeRequest=RequestCode::find($id);
    	return view('admin.discount.requestCodeEdit',compact('codeRequest'));
    }

    public function requestCodeList()
    {
        $codeRequest=RequestCode::get();
        return view('admin.discount.requestCodeList',compact('codeRequest'));
    }

    public function indexReg()
    {
        $discounts=Discount::where('user_type',0)->orWhere('user_type',2)->get();
        return view('admin.discount.index',compact('discounts'));
    }

    public function checkUserName(Request $request)
    {
    	$user=User::where('user_name',$request->userName)->where('status',1)->first();
    	if ($user) {
    		return response()->json([
    			'status'=>true,
    		]);
    	}
    	return response()->json([
    			'status'=>false,
    		]);
    }

    public function requestUpdate(Request $request)
    {
        try {
             DB::beginTransaction();
             $update=RequestCode::find($request->id);
             $update->status=$request->status;
             $update->save();
             DB::commit();
             $request->session()->flash('success', "Update successfully");
             return back();
            } catch (Exception $e) {
              DB::rollback();
             $request->session()->flash('error', 'Something wrong!');
             return back(); 
        }
    }

    public function store(Request $request)
    {
    	try {

            DB::beginTransaction();
            
            $save=new Discount();
            $save->code=$request->code;
            $save->email=$request->email;
            $save->user_id=Auth::id();
            $save->amount=0;
            $save->user_type=0;
            $save->save();
            $check=RequestCode::where('email',$request->email)->orderBy('id','DESC')->first();
            if ($check) {
             $update=RequestCode::find($check->id);
             $update->status=1;
             $update->save();
             $data=[
                'name'=>$check->full_name,
                'code'=>$request->code,
            ];
             Mail::to($request->email)->send(new Notification($data));
            }
            DB::commit();
            $request->session()->flash('success', "Save successfully");
            return back();
            } catch (Exception $e) {
              DB::rollback();
             $request->session()->flash('error', 'Something wrong!');
             return back(); 
        }
    }

    public function delete(Request $request)
    {
    	try {
            DB::beginTransaction();
            $save=Discount::find($request->id);
            $save->delete();
            DB::commit();
             $request->session()->flash('success', "Delete successfully");
             return back();
            } catch (Exception $e) {
              DB::rollback();
             $request->session()->flash('error', 'Something wrong!');
             return back(); 
        }
    }
}
