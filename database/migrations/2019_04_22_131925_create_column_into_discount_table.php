<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColumnIntoDiscountTable extends Migration
{
    
    public function up()
    {
        Schema::table('discount_code', function (Blueprint $table) {
            $table->integer('user_type')->default(1);
            $table->string('email')->nullable();
        });
    }

    public function down()
    {
        
    }
}
