<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectAcademyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_academy', function (Blueprint $table) {
            $table->bigInteger('project_id')->unsigned();
            $table->bigInteger('academy_id')->unsigned();

            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('academy_id')->references('id')->on('academies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_academy');
    }
}
