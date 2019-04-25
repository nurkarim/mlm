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
use Illuminate\Contracts\Validation\Rule;
class DiscountConytroller extends Controller
{
 

    public function requestCodeList()
    {
        $codeRequest=RequestCode::orderBy('id','DESC')->get();
        return view('admin.discount.requestCodeList',compact('codeRequest'));
    }

    public function indexReg()
    {
        $discounts=Discount::orderBy('status','ASC')->get();
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

    public function requestCodeDelete(Request $request)
    {
        try {
             DB::beginTransaction();
             $delete=RequestCode::find($request->id);
             $delete->delete();
             DB::commit();
             $request->session()->flash('success', "Delete successfully");
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

            $this->validate($request, [
                'code' => 'required|unique:discount_code',
                'amount' => 'required|checkFunds',
               ]);
            
            if (Auth::user()->funds_amount < 0.50) {
                $request->session()->flash('error', 'Sorry!Your wallet empty.');
                return back();
            }
            $save=new Discount();
            $save->code=$request->code;
            $save->user_id=Auth::id();
            $save->amount=0.50;
            $save->user_type=1;
            $save->save();
            Auth::user()->decrement('funds_amount', $save->amount);
            Transaction::create([
                    'user_id'=>Auth::id(),
                    'type'=>5,
                    'note'=>'Purchase Discount Code "'.$request->code.'"',
                    'amount'=>$save->amount,
                    'total'=>$save->amount,
                    'from'=>'Funds Wallet',
                    'to'=>'Admin',
                    'status'=>1,
                    ]);

            DB::commit();
            $request->session()->flash('success', "Discount code purchase successfully");
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
