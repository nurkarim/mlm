<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;
class Genealogy extends Model
{
    use Userstamps;
     protected $guarded =['id'];
    
    protected $table="genealogy";
}
