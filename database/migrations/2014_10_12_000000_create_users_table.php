<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('user_name')->unique();
            $table->string('phone')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->text('address')->nullable();
            $table->integer('referral_id')->default(0);
            $table->integer('placement_id')->default(0);
            $table->decimal('funds_amount',8,2)->default(0);
            $table->decimal('wallet_amount',8,2)->default(0);
            $table->integer('total_position_count')->default(0);  
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('pin_no')->nullable();
            $table->string('image')->nullable();
            $table->integer('user_type')->default(1);
            $table->integer('status')->default(0);
            $table->rememberToken();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
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
        Schema::dropIfExists('users');
    }
}
