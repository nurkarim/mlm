<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('app_name')->nullable();
            $table->string('app_email')->nullable();
            $table->string('app_contact')->nullable();
            $table->text('facebook')->nullable();
            $table->text('youtube')->nullable();
            $table->text('twitter')->nullable();
            $table->text('strip_secret_key')->nullable();
            $table->text('strip_app_key')->nullable();
            $table->text('bitcoin_app_key')->nullable();
            $table->text('bitcoin_api_key')->nullable();
            $table->text('bitcoin_wallet_key')->nullable();
            $table->string('logo')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('app_settings');
    }
}
