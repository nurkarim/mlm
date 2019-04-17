<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;
use App\User;
class AddFundsWallet extends Model
{
    
    use Userstamps;
    protected $guarded =['id'];
    protected $table="add_funds_into_wallet";
     public function user()
    {
    	return $this->belongsTo(User::class,'user_id','id');
    }
}
