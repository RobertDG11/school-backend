<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description');
            $table->string('file')->nullable();
            $table->string('photo')->nullable();
            $table->string('date_hired');
            $table->string('phone_number');
            $table->bigInteger('teacher_id')->unsigned();
            $table->timestamps();
            $table->foreign('teacher_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teacher_details', function (Blueprint $table) {
            $table->dropForeign('teacher_id');
            Schema::dropIfExists('teacher_details');

        });
    }
}
