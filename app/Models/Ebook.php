<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Ebook extends Model
{
	use Userstamps;
	
    protected $table="ebooks";
    
}
