<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\CoinpaymentTransaction;
use Log;
class CheckCoinpayment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'coinpayment:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Transaction details';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $data=CoinpaymentTransaction::where('status',0)->orWhere('status',1)->get();
        foreach ($data as $key => $value) {
            if ($value->payment_id!=null) {
            
            CoinpaymentTransaction::updateTransaction($value->payment_id);

            }
        }

        CoinpaymentTransaction::updateFundsFromCoin();
    }
}
