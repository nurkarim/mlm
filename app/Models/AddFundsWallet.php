<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;
class AddFundsWallet extends Model
{
    
    use Userstamps;
    protected $table="add_funds_into_wallet";
}
