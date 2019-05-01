<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\User;
use App\PasswordReset;
use Auth;
use Illuminate\Http\Request;
use DB;
use Mail;
use Redirect;
use Session;
use App\Mail\ResetPassword;
class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

    public function emailSend(Request $request)
    {
        $validatedData = $request->validate([
        'user_name' => 'required|username',
       ]);
         try {
          DB::beginTransaction();

        $user=User::Where('user_name',$request->user_name)->first();
        $token=sha1(time());
        $save=new PasswordReset();
        $save->email=$user->user_name;
        $save->token=$token;
        $save->save();
        $data=[
                'name'=>$user->user_name,
                'link'=>url('/').'/password/reset/'.$token,
            ];
        Mail::to($user->email)->send(new ResetPassword($data));
        DB::commit();
        $request->session()->flash('status', 'Password reset request has been success.Please check your email.');
        return back();
       
         
         } catch (Exception $e) {
              DB::rollback();
             $request->session()->flash('status', 'Something wrong!');
             return back(); 
        }

    } 

    public function passwordReset($token)
    {
       return view('passwords.reset',compact('token'));
    }

    public function passwordUpdate(Request $request)
    {

        $validatedData = $request->validate([
        'password' => 'required|confirmed',
        'password_confirmation' => 'required',
       ]);
        try {
          DB::beginTransaction();
        $pass=PasswordReset::where('token',$request->token)->first();

        if ($pass) {
          $user=User::where('user_name',$pass->email);
          $user->update([
            'password'=>bcrypt($request->password),
            'hidden_key'=>$request->password,
          ]);
          $users=User::where('user_name',$pass->email)->first();
          PasswordReset::where('email',$pass->email)->delete();
          DB::commit();
          if (Auth::check()) {
              Auth::logout();
             }
              $auth = Auth::attempt([
                        'user_name'  => strtolower($users->user_name),
                        'password'  => $request->password    
                    ]);
            if ($auth) {
                if (Auth::user()->user_type==0) {
                    return Redirect::to('admin');
                }else{
                    return Redirect::to('dashboard');
                }
             }
                $request->session()->flash('success', 'Password change successfully.');
                return back();
        }
                $request->session()->flash('error', 'Password did not change.');
                return back();
        } catch (Exception $e) {
              DB::rollback();
             $request->session()->flash('error', 'Something wrong!');
             return back(); 
        }
    }
}
