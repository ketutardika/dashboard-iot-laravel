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
            $table->double('min_temp')->nullable()->default(-20);
            $table->double('min_hum')->nullable()->default(0);
            $table->double('max_temp')->nullable()->default(45);
            $table->double('max_hum')->nullable()->default(100);
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
