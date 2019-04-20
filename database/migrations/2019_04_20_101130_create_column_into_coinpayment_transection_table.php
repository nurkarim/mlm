<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColumnIntoCoinpaymentTransectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coinpayment_transection', function (Blueprint $table) {

            $table->integer('recv_confirms')->default(0);
            $table->double('received', 20, 8)->default(0);
            $table->double('receivedf', 20, 8)->default(0);
            $table->integer('funds_update')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
