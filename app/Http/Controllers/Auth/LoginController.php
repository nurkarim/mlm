<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Redirect;

class LoginController extends Controller
{

   // use AuthenticatesUsers;

    protected $redirectTo = '/dashboard';

    

    public function login()
    {
        return view('login');
    }

    public function checkLogin(Request $request)
    {
        $remember = ($request->has('remember')) ? true : false;
        $auth = Auth::attempt(
            [
                'email' => $request->get('email'),
                'password' => $request->get('password'),
            ], $remember
        );
        if ($auth) {
            if (Auth::user()->user_type == 0) {
              
                return Redirect::to('admin');
            } else if (Auth::user()->user_type == 1) {
                return Redirect::to($this->redirectTo);
            }
        } else {
            return Redirect::to('login')
                ->withInput($request->except('password'))
                ->with('flash_notice', 'Your username/password combination was incorrect.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
           return Redirect::to('login')
                ->withInput($request->except('password'))
                ->with('flash_notice', 'Logout successfully');
    }
}
