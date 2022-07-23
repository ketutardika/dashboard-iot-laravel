<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSensorsTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensors_type', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sensor_type_name', 40);
            $table->string('sensor_type_code', 40)->nullable();
            $table->string('sensor_type_measurement', 40)->nullable();
            $table->string('sensor_type_measurement_code', 40)->nullable();
            $table->text('sensor_type_description')->nullable();
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
        Schema::dropIfExists('sensors_type');
    }
}
