<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->bigIncrements('file_id');
            $table->string('file_path');
            $table->string('file_name');
            $table->string('file_description');
            $table->integer('department_id');
            $table->integer('session_id');
            $table->integer('semester_id');
            $table->integer('course_id');
            $table->string('user_name');
            $table->bigInteger('file_size');
            $table->string('file_ext');
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
        Schema::dropIfExists('files');
    }
}
