<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSensorsDatalogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensors_datalog', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('unique_id', 10);
            $table->string('data_reading', 10);
            $table->string('data_measurement', 20);
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
        Schema::dropIfExists('sensors_datalog');
    }
}
