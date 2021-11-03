<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email')->default('joaovieira@gmail.com');
            $table->integer('spainInsurance')->default(25);
            $table->integer('gps')->default(30);
            $table->integer('extraDriver')->default(20);
            $table->integer('todlerSeat')->default(20);
            $table->integer('infantSeat')->default(25);
            $table->integer('boosterSeat')->default(25);
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
        Schema::dropIfExists('settings');
    }
}
