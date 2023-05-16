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
            $table->id();
            $table->text('imagePath')->nullable();
            $table->string('title');
            $table->string('location');
            $table->string('status');
            $table->integer('mentor');
            $table->integer('partner');
            $table->integer('qttOfBoys');
            $table->integer('qttOfGirls');
            $table->dateTime('startDate');
            $table->dateTime('finishDate');
            $table->text('problemBackground');
            $table->text('problemDescription');
            $table->text('problemSolution');
            $table->text('problemInnovation');
            $table->integer('equipmentPrice');
            $table->integer('transportPrice');
            $table->integer('servicesPrice');
            $table->integer('rentPrice');
            $table->integer('rawPrice');
            $table->integer('otherPrice');
            $table->text('resources');
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
        Schema::dropIfExists('projects');
    }
}
