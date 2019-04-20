<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\CoinpaymentTransaction;

class UpdateFundsCoin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'funds:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'User funds update from coinpayment';

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
        CoinpaymentTransaction::updateFundsFromCoin();
    }
}
