<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;
class AdditionalMatrix extends Model
{
	use Userstamps;
    protected $guarded =['id'];
    protected $table="additional_matrix_4x3";

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
