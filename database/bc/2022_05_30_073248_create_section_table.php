<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects_sections', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id', 20);
            $table->string('unique_id_project', 20);
            $table->string('name_section', 40);
            $table->string('type_section', 40)->nullable();
            $table->text('description_section')->nullable();
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
        Schema::dropIfExists('project_sections');
    }
}
