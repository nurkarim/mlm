<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Commission extends Model
{
	use Userstamps;
    protected $table="commission_settings";
}
