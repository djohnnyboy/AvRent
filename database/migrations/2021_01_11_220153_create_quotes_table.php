<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('pickUpDate');
            $table->date('dropOffDate');
            $table->integer('age');
            $table->string('carros');
            $table->integer('days')->nullable();

            $table->unsignedBigInteger('car_id')->nullable();
            $table->foreign('car_id')->references('id')->on('carros')->onDelete('cascade');
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
        Schema::dropIfExists('quotes');
    }
}
