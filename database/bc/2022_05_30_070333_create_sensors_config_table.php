<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSensorsConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensors_config', function (Blueprint $table) {
            $table->string('sensor_unique_id', 20)->primary();
            $table->float('min_temp', 10, 0)->nullable()->default(-20);
            $table->float('min_hum', 10, 0)->nullable()->default(0);
            $table->float('max_temp', 10, 0)->nullable()->default(45);
            $table->float('max_hum', 10, 0)->nullable()->default(100);
            $table->bigInteger('read_sensor_time')->nullable();
            $table->bigInteger('send_sensor_time')->nullable();
            $table->bigInteger('deepsleep_time')->nullable()->default(15);
            $table->timestamps();
            $table->boolean('deleted')->nullable()->default(false);
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sensors_config');
    }
}