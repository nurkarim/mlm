<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\Genealogy;
use App\Models\Discount;
use App\User;
use App\RequestCode;
use App\Mail\Resitration;
use DB;
use Mail;
use Auth;
use Redirect;
class RegisterController extends Controller
{
    public function checkPosition(Request $request)
    {
        $user=User::where('user_name',$request->userName)->first();
        if ($user) {
           $tree=User::where('placement_id',$user->id)->count();
           if ($tree==4) {
            return response()->json([
                'status'=>true,
            ]);   
           }
        }
    }

    public function checkDiscountCode(Request $request)
    {
        $code=Discount::where('code',$request->code)->where('status',0)->first();
        if ($code) {
            return response()->json([
                'status'=>true,
            ]);
        }
        return response()->json([
                'status'=>false,
            ]);
    }

    public function requestCode(Request $request)
    {
       try {
          DB::beginTransaction();
          $save=new RequestCode();
          $save->full_name=$request->fullName;
          $save->email=$request->email;
          $save->save();
          if ($save) {
           $request->session()->flash('success', 'Request successfully.');
          }else{
           $request->session()->flash('error', 'Something wrong!');
          }
          DB::commit();
          return back(); 
         } catch (Exception $e) {
              DB::rollback();
             $request->session()->flash('error', 'Something wrong!');
             return back(); 
        }
    }

    public function store(UserRequest $request)
    {
       try {
        DB::beginTransaction();
            $refe=User::where('user_name',$request->referral)->first();
            if (!$refe) {
             $request->session()->flash('error', 'Referral username not found.');
             return back();
            }
            $postion=User::where('user_name',$request->placement_name)->first();
            if (!$postion) {
             $request->session()->flash('error', 'Position username not found.');
             return back();
            }
            $code=Discount::where('code',$request->discount)->where('status',0)->first();
            if (!$code) {
             $request->session()->flash('error', 'Sorry!Discount code not found.');
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
               $dis=Discount::find($code->id);
               $dis->status=1;
               $dis->save();
            }
            $data=[
                'name'=>$request->name,
                'userName'=>$request->user_name,
                'password'=>$request->password,
                'created_at'=>$user->created_at,
                'link'=>url('/').'/email/verify/'.$token,
            ];
            Mail::to($request->email)->send(new Resitration($data));
            DB::commit();
              if (Auth::check()) {
              Auth::logout();
             }
              $auth = Auth::attempt([
                        'user_name'  => strtolower($request->user_name),
                        'password'  => $request->password    
                    ]
                );
            if ($auth) {
                    return Redirect::to('dashboard');
             }
             $request->session()->flash('success', "Registration successfully");
             return back();
            } catch (Exception $e) {
              DB::rollback();
             $request->session()->flash('error', 'Something wrong!');
             return back(); 
        }
    }

    public function verifyUser($token)
    {
      $user = User::where('token', $token)->first();
      if(isset($verifyUser) ){
        if(!$user->email_verified) {
          $user->email_verified = 1;
          $user->save();
          $status = "Your e-mail is verified. You can now login.";
        } else {
          $status = "Your e-mail is already verified. You can now login.";
        }
      } else {
        return redirect('/login')->with('error', "Sorry your email cannot be identified.");
      }
      return redirect('/login')->with('error', $status);
    }
}
