<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hexters\CoinPayment\Entities\cointpayment_log_trx;
use Hexters\CoinPayment\Http\Resources\TransactionResourceCollection;
use App\CoinpaymentTransaction;
use App\User;
use CoinPayment;
use App\Models\AddFundsWallet;
use App\Models\Transaction;
class CoinpaymentTransaction extends Model
{
    protected $table="coinpayment_transection";

    public static function updateTransaction($paymentId)
    {
      $check = CoinPayment::api_call('get_tx_info', [
        'txid' => $paymentId
      ]);
      if($check['error'] == 'ok'){
      	$data = $check['result'];
        $trx=CoinpaymentTransaction::where('payment_id',$paymentId);
         $trx->update([
            'status_text' => $data['status_text'],
            'status' => $data['status'],
            'confirmation_at' => ((INT) $data['status'] === 100) ? date('Y-m-d H:i:s', $data['time_completed']) : null
          ]);

      }
    }

    public static function updateFundsFromCoin()
    {
        $data=CoinpaymentTransaction::where('status',100)->where('funds_update',0)->get();
        foreach ($data as $key => $value) {
          User::where('id',$value->user_id)->increment('funds_amount', $value->usd_amount);
          CoinpaymentTransaction::where('payment_id',$value->payment_id)->update([
            'funds_update'=>1,
          ]);

          AddFundsWallet::create([
                        'user_id'=>$value->user_id,
                        'type'=>2,
                        'coinbase_charge_id'=>$value->payment_id,
                        'coinbase_wallet_address'=>$value->payment_address,
                        'amount'=>$value->usd_amount,
                        'fee'=>0,
                        'total'=>$value->usd_amount,
                    ]);

          Transaction::create([
                    'user_id'=>$value->user_id,
                    'type'=>2,
                    'note'=>'Add funds',
                    'amount'=>$value->usd_amount,
                    'total'=>$value->usd_amount,
                    'from'=>'Coinpayment',
                    'to'=>'Funds Wallet',
                    'status'=>1,
                    ]);
        }
    }
}
