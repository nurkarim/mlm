<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Withdrawal extends Model
{
    
    protected $guarded =['id'];
    
    protected $table="withdrawals";
    public function user()
    {
    	return $this->belongsTo(User::class,'user_id','id');
    }
}
