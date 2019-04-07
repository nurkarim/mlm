<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;
use App\Models\Commission;
use App\Models\Transaction;
use App\Mail\Resitration;
use DB;
use Mail;
use Auth;
use Redirect;
class UserController extends Controller
{
    public function create()
    {
    	return view('user.buyPosition.create');
    }

    public function store(UserRequest $request)
    {
    	try {
             DB::beginTransaction();
            $refe=User::where('user_name',$request->referral)->first();
            if (!$refe) {
             $request->session()->flash('error', 'Referral  not found.');
             return back();
            }
            $postion=User::where('user_name',$request->placement_name)->first();
            if (!$postion) {
             $request->session()->flash('error', 'Position  not found.');
             return back();
            }
            $tree=User::where('placement_id',$postion->id)->count();
            if ($tree==4) {
                 $request->session()->flash('error', 'Sorry! Already fill up position.');
                 return back();
            }
            $token=sha1(time());
            $user=new User();
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=bcrypt($request->password);
            $user->user_name=$request->user_name;
            $user->hidden_key=$request->password;
            $user->referral_id=$refe->id;
            $user->placement_id=$postion->id;
            $user->token=$token;
            $user->user_type=1;
            $user->save();
            if ($user) {
            $data=[
                'name'=>$request->name,
                'userName'=>$request->user_name,
                'password'=>$request->password,
                'created_at'=>$user->created_at,
                'link'=>url('/').'/email/verify/'.$token,
            ];
            $amount='0.50';
            $this->unilevel($amount,$user->id);
            Mail::to($request->email)->send(new Resitration($data));
            DB::commit();
        
             $request->session()->flash('success', "Buying position successfully");
             return back();
             }
             $request->session()->flash('error', "Buying position unsuccessfully");
             return back();
            } catch (Exception $e) {
                return $e;
              DB::rollback();
             $request->session()->flash('error', 'Something wrong!');
             return back(); 
        }
    }

    public $latestLevel;
    public $array;
    public function checkLevel($uid, $referId, $i)
    {

        $user = User::find($uid);
        if ($user) {

            if ($referId == $user->referral_id) {
                $this->latestLevel = $i;
            }
            $i++;
            self::checkLevel($user->referral_id, $referId, $i);
        }
    }

    public function unilevelMember($id, $level)
    {
        $user = User::find($id);
        if ($user) {
            $use = User::where('id',$user->referral_id)->first();
            if($use){

            $this->array[] = [
                'id' => $user->id,
                'user_id' => $user->referral_id,
            ];
        }
            if ($level <= 12) {
                $level++;
                self::unilevelMember($user->referral_id, $level);
            }

        }
    }

    public function unilevel($amount, $user_ID)
    {
    	self::unilevelMember($user_ID, 1);
    	$levelSettings = Commission::all();
    	$collect = collect($levelSettings);
    	foreach ($this->array as $key => $value) {
    	 self::checkLevel($user_ID, $value['user_id'], 1);
    	 $getLev = $collect->where('level_id', $this->latestLevel)->first();
    	 $ernamount = ($amount * $getLev->percent) / 100;
         $getAmount = intval(($ernamount * 100)) / 100;
         Transaction::create([
         	'user_id'=>$value['user_id'],
         	'type'=>2,
         	'note'=>'Earning from affiliate commission',
         	'amount'=>$getAmount,
         	'total'=>$getAmount,
         	'from'=>'Admin',
         	'to'=>'Withdrawal Wallet',
         	'position_level'=>$this->latestLevel,
         	'who_join'=>$user_ID,
         	'status'=>1,
         ]);
         $users=User::where('id',$value['user_id'])->increment('wallet_amount', $getAmount);
    	}
    }
}
