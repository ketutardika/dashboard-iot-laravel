<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('unique_id', 20);
            $table->string('unique_id_farm', 20);
            $table->string('name_project', 40);
            $table->string('type_project', 40)->nullable();
            $table->text('description_project')->nullable();
            $table->integer('user_id')->nullable();
            $table->timestamps();
            $table->boolean('deleted')->nullable()->default(false);
            $table->boolean('isactive')->nullable()->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
