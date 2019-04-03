<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFundsTransferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funds_transfer', function (Blueprint $table) {
            $table->increments('id');
            $table->text('remark')->nullable();
            $table->decimal('amount',8,2)->default(0);
            $table->integer('user_id')->unsigned();
            $table->integer('to_user_id')->unsigned();
            $table->integer('status')->default(1);
            $table->timestamps();
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
            $table->foreign('to_user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funds_transfer');
    }
}
