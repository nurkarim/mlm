<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoinpaymentTransectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coinpayment_transection', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('payment_id')->nullable();
            $table->string('payment_address')->nullable();
            $table->string('coin', 10)->nullable();
            $table->string('fiat', 10)->nullable();
            $table->string('status_text')->nullable();
            $table->integer('status')->default(0);
            $table->datetime('payment_created_at')->nullable();
            $table->datetime('expired')->nullable();
            $table->datetime('confirmation_at')->nullable();
            $table->double('amount', 20, 8)->nullable();
            $table->double('usd_amount', 8, 2)->nullable();
            $table->integer('confirms_needed')->nullable();
            $table->string('qrcode_url')->nullable();
            $table->string('status_url')->nullable();
            $table->text('payload')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coinpayment_transection');
    }
}
