<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Coinbase\Wallet\Client;
use Coinbase\Wallet\Configuration;
use Carbon\Carbon;
use Stripe\Stripe;
use Coinbase\Wallet\Resource\Checkout;
use Coinbase\Wallet\Value\Money;
// use App\Helper\Coinbase;
use Redirect;
use App\Models\AddFundsWallet;
use Auth;
use DB;
use Coinbase;
class AddFundsController extends Controller
{
    public function create()
    {
    	return view('user.addFunds.create');
    }

    public function store(Request $request)
    {
        $checkouts = Coinbase::getCheckouts();
        print_r($checkouts);
        return exit();
        try {
             DB::beginTransaction();

        // $coinbase = new Coinbase(env('COINBASE_KEY'));
        // $balance = $coinbase->getReceiveAddress();
        // echo "Balance is " . $balance . " BTC";
        // return exit();
        $grandTotal=$request->amount;
    	if ($request->type==2) {
    		
    		$configuration = Configuration::apiKey(env('COINBASE_KEY'), env('COINBASE_SECRET_KEY'));
            $client = Client::create($configuration);
   
    		$amount = 0.50;
			$orderId = 12;

			$params = array(
			    'name'          => 'Site order ID: '.$orderId,
			    'amount'        => new Money($amount, 'USD'),
			    'metadata'      => array('order_id' => $orderId),
			    'auto_redirect' => true
			);

			$checkout = new Checkout($params);
			$client->createCheckout($checkout);
			$code = $checkout->getEmbedCode();

			$redirect_url = "https://www.coinbase.com/checkouts/".$code;
			return Redirect::to($redirect_url);

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
                $totalCharge = $grandTotal + $withFee;
                $val = round($totalCharge * 100);
                $total = intval($val);
                $token = $token['id'];
                $charge = \Stripe\Charge::create([
                        'amount' => $val,
                        'currency' => 'GBP',
                        'description' => 'New Order charge',
                        'source' => $token,
                    ]);
             
                if ($charge['status'] == 'succeeded') {
                    AddFundsWallet::create([
                        'user_id'=>Auth::id(),
                        'type'=>1,
                        'strip_charge_id'=>$charge->id,
                        'strip_details'=>$charge['source'],
                        'amount'=>$grandTotal,
                        'fee'=>$stripFee,
                        'total'=>$grandTotal,
                    ]);
                    $request->session()->flash('success', 'The add funds request successfully');
                
                }else{
            $request->session()->flash('error', 'Sorry!something was wrong.Please try again latter.');
                }
    	}
        DB::commit();
           
        return back();
        } catch (Exception $e) {
                return $e;
              DB::rollback();
             $request->session()->flash('error', 'Something wrong!');
             return back(); 
        }
    }
}
