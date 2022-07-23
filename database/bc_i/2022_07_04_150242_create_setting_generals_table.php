<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingGeneralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_generals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('unique_id', 20);
            $table->string('title', 40);
            $table->string('tagline')->nullable();
            $table->text('description')->nullable();
            $table->string('email', 50)->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('theme', 50)->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('language', 50)->nullable();
            $table->string('timezone', 50)->nullable();
            $table->string('date_format', 50)->nullable();
            $table->string('time_format', 50)->nullable();
            $table->integer('user_id')->nullable();
            $table->boolean('deleted')->nullable()->default(false);
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
        Schema::dropIfExists('setting_generals');
    }
}
