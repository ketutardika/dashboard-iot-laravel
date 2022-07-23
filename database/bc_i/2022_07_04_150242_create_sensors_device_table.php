<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSensorsDeviceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensors_device', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('unique_id', 20);
            $table->string('name_sensor', 50);
            $table->integer('id_sensor_type')->nullable();
            $table->text('notes')->nullable();
            $table->string('version', 20)->nullable();
            $table->double('last_temp')->nullable();
            $table->double('last_hum')->nullable();
            $table->timestamp('last_check')->nullable();
            $table->string('contact', 90)->nullable();
            $table->string('contact_type', 90)->nullable()->default('0');
            $table->integer('pin')->nullable();
            $table->boolean('status_device')->default(false);
            $table->string('api_key', 32)->nullable();
            $table->integer('id_section')->nullable();
            $table->integer('section_number')->nullable();
            $table->integer('id_project')->nullable();
            $table->integer('id_location')->nullable();
            $table->integer('id_organization')->nullable();
            $table->integer('id_user');
            $table->timestamps();
            $table->boolean('deleted')->nullable()->default(false);
            $table->string('unique_id_section', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sensors_device');
    }
}
