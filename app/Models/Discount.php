<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;
use App\User;
class Discount extends Model
{
	use Userstamps;
    protected $table="discount_code";
    
    public function user()
    {
    	return $this->belongsTo(User::class,'user_id','id');
    }
}
