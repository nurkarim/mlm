<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdditionalMatrixFourIntoSeven extends Model
{
	 protected $guarded =['id'];
   protected $table="additional_matrix_4x7";
     public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
