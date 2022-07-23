<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farm_organizations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('unique_id', 20);
            $table->string('name_organization', 40);
            $table->text('description_farm')->nullable();
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('farm_organizations');
    }
}
