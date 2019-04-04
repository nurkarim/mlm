<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;
class Transaction extends Model
{
	 use Userstamps;
     protected $table="transactions";
}
