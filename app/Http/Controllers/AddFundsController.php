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
use App\Models\Transaction;
use Auth;
use DB;
use App\User;
use App\CoinpaymentTransaction;
use Coinbase;
use CoinPayment;
use Coinbase\Wallet\Enum\CurrencyCode;
//use Coinbase\Wallet\Resource\Transaction;
use Coinbase\Wallet\Resource\Order;
use App\Mail\FundsRequest;
use Mail;
class AddFundsController extends Controller
{
    public function create()
    {
    	return view('user.addFunds.create');
    }

    public function coinbasePayment($value='')
    {
        $configuration = Configuration::apiKey(env('COINBASE_KEY'), env('COINBASE_SECRET_KEY'));
        $client = Client::create($configuration);

        $amount = 0.1;
        $orderId = "242";

        $params = array(
            'name'          => 'Site order ID: '.$orderId,
            'amount'        => new Money($amount, 'USD'),
            'metadata'      => array('order_id' => $orderId),
            'auto_redirect' => true
        );

        $checkout = new Checkout($params);
        $client->createCheckout($checkout);
        $code = $checkout->getEmbedCode();

        $redirect_url = "https://www.coinbase.com/checkouts/$code";
    }

        public function storeCoinPayment()
        {
            $trx['amountTotal'] = 0.05; // USD
            $trx['note'] = 'Note for your transaction';
            $trx['items'][0] = [
                'descriptionItem' => 'Add Funds',
                'priceItem' => 0.05, // USD
                'qtyItem' => 1,
                'subtotalItem' => 0.05 // USD
            ];
        // $trx['payload'] = [
        //     // your custom array here
        //     'foo' => [
        //         'foo' => 'bar'
        //     ]
        // ];

        $link_transaction = CoinPayment::url_payload($trx);

        return view('test',compact('link_transaction'));

        }
    

    public function store(Request $request)
    {

        try {
             DB::beginTransaction();
            $grandTotal=$request->amount;
    	if ($request->type==2) {
    		
    		$trx['amountTotal'] = $grandTotal; // USD
            $trx['note'] = 'Note for your transaction';
            $trx['items'][0] = [
                'descriptionItem' => 'Add Funds',
                'priceItem' => $grandTotal, // USD
                'qtyItem' => 1,
                'subtotalItem' => $grandTotal // USD
            ];
          $redirect_url = CoinPayment::url_payload($trx);
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
                        'currency' => 'usd',
                        'description' => 'Add Funds into wallet',
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

                    Transaction::create([
                    'user_id'=>Auth::id(),
                    'type'=>2,
                    'note'=>'Add funds',
                    'amount'=>$grandTotal,
                    'total'=>$grandTotal,
                    'from'=>'Stripe',
                    'to'=>'Funds Wallet',
                    'status'=>1,
                    ]);

                    $user=User::find(Auth::id());
                    $user->funds_amount=$user->funds_amount+$grandTotal;
                    $user->save();
                $data=[
                'name'=>Auth::user()->name,
                'user_name'=>Auth::user()->user_name,
                'date'=>date('Y-m-d'),
                'amount'=>$grandTotal,
                'fee'=>$stripFee,
                'type'=>'Stripe',
            ];
                 Mail::to(Auth::user()->email)->send(new FundsRequest($data));
                    $request->session()->flash('success', 'The add funds request successfully');
                
                }else{
            $request->session()->flash('error', 'Sorry!something was wrong.Please try again latter.');
                }
    	}
            DB::commit();
            return back();
             }catch(\Stripe\Error\Card $e) {
                 $body = $e->getJsonBody();
                 $err  = $body['error'];
                $request->session()->flash('error', $err['message']);
                 return back();
              }catch (\Stripe\Error\RateLimit $e) {
             $request->session()->flash('error', 'Too many requests made to the API too quickly');
             return back();
        
            } catch (\Stripe\Error\InvalidRequest $e) {
                $request->session()->flash('error', 'Invalid parameters were supplied to Stripe API');
             return back();
            } catch (\Stripe\Error\Authentication $e) {
                 $request->session()->flash('error', "Authentication with Stripe's API failed. (maybe you changed API keys recently)");
               return back();
            } catch (\Stripe\Error\ApiConnection $e) {
                $request->session()->flash('error', "Network communication with Stripe failed");
               return back();
             
            } catch (\Stripe\Error\Base $e) {
             $request->session()->flash('error', "Display a very generic error to the user, and maybe send");
               return back();
            } catch (Exception $e) {
              DB::rollback();
             $request->session()->flash('error', 'Something wrong!');
             return back(); 
        }
    }

    public function coinpayment()
    {
        $data=CoinpaymentTransaction::where('user_id',Auth::id())->get();
        return view('user.coinpayment.list',compact('data'));
    }
}
