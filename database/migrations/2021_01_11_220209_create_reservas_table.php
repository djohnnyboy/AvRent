<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('visitor')->nullable();
            $table->string('device')->nullable();
            $table->string('name');
            $table->string('email');
            $table->integer('phone');
            $table->date('dateOfbirth');
            $table->string('drivinglicence')->nullable();
            $table->integer('pickUpPlace');
            $table->date('pickUpDate');
            $table->time('pickUpTime', 0);
            $table->integer('dropOffPlace');
            $table->date('dropOffDate');
            $table->time('dropOffTime', 0);
            $table->string('flightNumber')->nullable();
            $table->integer('fullInsurance')->nullable();
            $table->integer('spainInsurance')->nullable();
            $table->integer('gps')->nullable();  
            $table->integer('extraDriver')->nullable();
            $table->integer('childTodlerSeats')->nullable();
            $table->integer('childInfantSeats')->nullable();
            $table->integer('childBoosterSeats')->nullable();
            $table->longtext('textArea')->nullable();
            $table->integer('age');           
            $table->string('termsAndConditions');
            $table->integer('preco'); 
            $table->integer('commission')->nullable(); 
            $table->string('paymentId')->nullable();  
            $table->unsignedBigInteger('car_id')->nullable();
            $table->foreign('car_id')->references('id')->on('carros')->onDelete('cascade');
            
            $table->unsignedBigInteger('quote_id')->nullable();
            $table->foreign('quote_id')->references('id')->on('quotes')->onDelete('cascade');
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
        Schema::dropIfExists('reservas');
    }
}
