<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddFundsIntoWalletTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_funds_into_wallet', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('type')->default(1);
            $table->text('coinbase_wallet_address')->nullable();
            $table->text('coinbase_charge_id')->nullable();
            $table->text('strip_details')->nullable();
            $table->text('strip_charge_id')->nullable();
            $table->decimal('amount',8,2)->default(0);
            $table->decimal('fee',8,2)->default(0);
            $table->decimal('total',8,2)->default(0);
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->integer('status')->default(0);
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('add_funds_into_wallet');
    }
}
