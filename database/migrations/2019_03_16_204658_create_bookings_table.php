<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('booker_id')->nullable(false)->unsigned();
            $table->bigInteger('classroom_id')->nullable(false)->unsigned();
            $table->string('name');
            $table->string('color')->default("#0000FF");
            $table->string('file')->default(NULL);
            $table->string('start')->nullable(false);
            $table->string('end')->nullable(false);
            $table->timestamps();
            $table->foreign('booker_id')->references('id')->on('users');
            $table->foreign('classroom_id')->references('id')->on('classrooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropForeign('booker_id');
            $table->dropForeign('classroom_id');
            Schema::dropIfExists('bookings');

        });
    }
}
