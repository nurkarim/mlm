<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
class ReferralCommission extends Model
{
    protected $guarded =['id'];
    
     protected $table="referral_commission";

    public function user()
    {
        return $this->belongsTo(User::class,'from_user_id','id');
    }
    public function fromuser()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
