<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Stripe\Stripe;
use App\Donation;
use App\Models\Transaction;
use Auth;
use DB;
class DonationController extends Controller
{
    public function create()
    {
    	return view('user.donation.create');
    }

    public function store(Request $request)
    {
    	try {
             DB::beginTransaction();
             $grandTotal=$request->amount;
             if ($request->type==2) {
             	if (Auth::user()->funds_amount < $request->amount) {
             		$request->session()->flash('error', 'Sorry! Your funds wallet not enough money.');
             		return back();
             	}
             	    $save=new Donation;
                	$save->user_id=Auth::id();
                	$save->type=$request->type;
                	$save->note=$request->note;
                	$save->amount=$grandTotal;
                	$save->save();
                	Auth::user()->decrement('funds_amount', $request->amount);
                	Transaction::create([
                    'user_id'=>Auth::id(),
                    'type'=>5,
                    'note'=>'Donation to infinite-funds',
                    'amount'=>$grandTotal,
                    'total'=>$grandTotal,
                    'from'=>'Funds Wallet',
                    'to'=>'Admin',
                    'status'=>1,
                    ]);

                	$request->session()->flash('success', 'Thank you for donation.Your donation send successfully');
             }else{
             if (empty($request->card_number)||empty($request->exp_date)||empty($request->exp_year)||empty($request->card_cvv)) {
                     $request->session()->flash('error', 'Fill up card form');
                     return back();
                }

                

                \Stripe\Stripe::setApiKey(env('STRIPE_KEY'));
                //$stripe = Stripe::make(env('STRIPE_KEY'));
                $token = \Stripe\Token::create([
                    'card' => [
                        'number' => $request->card_number,
                        'exp_month' => $request->exp_date,
                        'exp_year' => $request->exp_year,
                        'cvc' => $request->card_cvv,
                    ],
                ]);

                  if (!isset($token['id'])) {
            $request->session()->flash('error', 'The Stripe Token was not generated correctly');
                    return back();
                }

                $stripFee=2.9;
                $withFee = (($grandTotal * $stripFee) / 100);
                $totalCharge = $grandTotal;
                $val = round($totalCharge * 100);
                $total = intval($val);
                $token = $token['id'];
                $charge = \Stripe\Charge::create([
                        'amount' => $val,
                        'currency' => 'usd',
                        'description' => 'Donation to infinite-funds',
                        'source' => $token,
                    ]);

                if ($charge['status'] == 'succeeded') {

                	$save=new Donation;
                	$save->user_id=Auth::id();
                	$save->type=$request->type;
                	$save->note=$request->note;
                	$save->stripe_id=$charge->id;
                	$save->amount=$grandTotal;
                	$save->save();

                	Transaction::create([
                    'user_id'=>Auth::id(),
                    'type'=>2,
                    'note'=>'Donation to infinite-funds',
                    'amount'=>$grandTotal,
                    'total'=>$grandTotal,
                    'from'=>'Stripe',
                    'to'=>'Admin',
                    'status'=>1,
                    ]);
                $request->session()->flash('success', 'Thank you for donation.Your donation send successfully');
                }
                else{
                $request->session()->flash('error', 'Sorry! Something wrong with your card details.');
                }
            }
              
            DB::commit();
            return back();
           } catch (Exception $e) {
              DB::rollback();
             $request->session()->flash('error', 'Something wrong!');
             return back(); 
        }
    }
}
