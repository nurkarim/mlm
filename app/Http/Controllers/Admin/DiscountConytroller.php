<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Transaction;
use App\User;
use DB;
class DiscountConytroller extends Controller
{
    public function index()
    {
    	$discounts=Discount::get();
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

    public function store(Request $request)
    {
    	try {

            DB::beginTransaction();
            $user=User::where('user_name',$request->user_name)->first();
            if (!$user) {
             $request->session()->flash('error', "Sorry!Username not found.");
             return back();
            }
            if ($user->funds_amount < '0.5') {
              $request->session()->flash('error', "Sorry! member need add funds their wallet.");
              return back();
            }
            $save=new Discount();
            $save->code=$request->code;
            $save->user_id=$user->id;
            $save->amount=0.5;
            $save->save();

            $update=User::find($user->id);
            $update->funds_amount=($user->funds_amount-0.5);
            $update->save();
            Transaction::create([
                    'user_id'=>$user->id,
                    'type'=>5,
                    'note'=>'Buy Discount Code',
                    'amount'=>0.5,
                    'total'=>0.5,
                    'from'=>'Funds Wallet',
                    'to'=>'Admin',
                    'status'=>1,
                    ]);
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
