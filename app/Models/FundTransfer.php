<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
class FundTransfer extends Model
{
    
    protected $guarded =['id'];
    
    protected $table="funds_transfer";
    public function user()
    {
    	return $this->belongsTo(User::class,'to_user_id','id');
    }

    public function fromuser()
    {
    	return $this->belongsTo(User::class,'user_id','id');
    }
}
