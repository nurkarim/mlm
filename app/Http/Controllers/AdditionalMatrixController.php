<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdditionalMatrix;
use App\AdditionalMatrixFourIntoSeven;
use App\User;
use App\Models\Transaction;
use App\Models\ReferralCommission;
use Auth;
use DB;
class AdditionalMatrixController extends Controller
{

	public $latestLevel;
    public $array;

    public function index()
    {
    	
    	return view('user.additionalMatrix.index');
    }

    public function view4x3(Request $request)
    {
    	try {
    	$users=AdditionalMatrix::where('placement_id',Auth::user()->id)->get();
    	$user=User::find(Auth::id());
    	return view('user.additionalMatrix.fourIntoThree',compact('users','user'));
    	} catch (Exception $e) {
    		
    	}
    } 

    public function findFourIntoThree($id)
    {
    	try {
    	$users=AdditionalMatrix::where('placement_id',$id)->get();
    	$user=User::find($id);
    	return view('user.additionalMatrix.fourIntoThree',compact('users','user'));
    	} catch (Exception $e) {
    		
    	}
    }

    public function createFourIntoThree($id)
    {
    	$user=User::find($id);
    	return view('user.additionalMatrix.addMatrix',compact('user'));
    }
    public function storeFourIntoThree(Request $request)
    {
    	try {
    		DB::beginTransaction();
    		if (Auth::user()->funds_amount < 5) {
            $request->session()->flash('error', 'Sorry! Please add funds to your wallet.');
                     return back();
            }
    		$referral=User::where('user_name',$request->referral_name)->first();
    		if (!$referral) {
    			$request->session()->flash('error', 'Sorry! The referral username not valid');
    			return back();
    		}
    		$user=User::where('user_name',$request->user_name)->first();
    		if (!$user) {
    			$request->session()->flash('error', 'Sorry! The join username not valid');
    			return back();
    		}	

    		$alreadyJoin=AdditionalMatrix::where('user_id',$user->id)->first();
    		if ($alreadyJoin) {
    			$request->session()->flash('error', 'Sorry! The username already use in additional matrix position');
    			return back();
    		}

    		$save=AdditionalMatrix::create([
    			'referral_id'=>$referral->id,
    			'placement_id'=>$referral->id,
    			'user_id'=>$user->id,
    		]);
    		if ($save) {
    			 $amount='5';
            Auth::user()->decrement('funds_amount', $amount);
            Transaction::create([
                    'user_id'=>Auth::id(),
                    'type'=>5,
                    'note'=>'Buying Additional Matrix Position',
                    'amount'=>$amount,
                    'total'=>$amount,
                    'from'=>'Funds Wallet',
                    'to'=>'Admin',
                    'status'=>1,
                    ]);
    			self::matrixPayout(5,$user->id);
    			$request->session()->flash('success', 'Buying position successfully');
    		}else{
    			$request->session()->flash('error', 'Buying position unsuccessfully');

    		}
			DB::commit();
			return back();
    	} catch (Exception $e) {
    		 DB::rollback();
             $request->session()->flash('error', 'Sorry! Something was wrong!');
             return back(); 
    	}
    }

    public function checkLevel($uid, $referId, $i)
    {

        $user = AdditionalMatrix::where('user_id',$uid)->first();
        if ($user) {

            if ($referId == $user->placement_id) {
                $this->latestLevel = $i;
            }
            $i++;
            self::checkLevel($user->placement_id, $referId, $i);
        }
    }

    public function matrixMemberSelect($id, $level)
    {
        $user = AdditionalMatrix::where('user_id',$id)->first();
        if ($user) {
            $use = AdditionalMatrix::where('placement_id',$user->placement_id)->first();
            if($use){

            $this->array[] = [
                'id' => $user->id,
                'user_id' => $user->placement_id,
            ];
        }
            if ($level <= 3) {
                $level++;
                self::matrixMemberSelect($user->placement_id, $level);
            }

        }
    }

    public function matrixPayout($amount, $user_ID)
    {
      self::matrixMemberSelect($user_ID, 1);
      $levelSettings = [
            ['level_id'=>1,
            	'percent'=>0,
            ],['level_id'=>2,
            	'percent'=>1.25,
            ],['level_id'=>3,
            	'percent'=>3.75,
            ]
      ];
      $collect = collect($levelSettings);
      foreach ($this->array as $key => $value) {
       self::checkLevel($user_ID, $value['user_id'], 1);
       $getLev = $collect->where('level_id', $this->latestLevel)->first();
       $getAmount = $getLev['percent'];
       if ($getAmount > 0) {
       
         Transaction::create([
          'user_id'=>$value['user_id'],
          'type'=>2,
          'note'=>'Earning additional matrix payout',
          'amount'=>$getAmount,
          'total'=>$getAmount,
          'from'=>'Admin',
          'to'=>'Withdrawal Wallet',
          'position_level'=>$this->latestLevel,
          'who_join'=>$user_ID,
          'status'=>1,
         ]);
         ReferralCommission::create([
            'user_id'=>$value['user_id'],
            'from_user_id'=>$user_ID,
            'amount'=>$getAmount,
            'level'=>$this->latestLevel,
         ]);
         $users=User::where('id',$value['user_id'])->increment('wallet_amount', $getAmount);
     }
      }
    }
}
