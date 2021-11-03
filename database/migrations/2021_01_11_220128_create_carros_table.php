<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('groupType')->unique(); 
            $table->string('marca');
            $table->integer('epocaBaixa');
            $table->integer('epocaMedia');
            $table->integer('epocaMediaAlta');
            $table->integer('epocaAlta');
            $table->integer('seguro');
            $table->string('transmissao');
            $table->integer('lugares');
            $table->integer('bagagemGr');
            $table->integer('bagagemPq');
            $table->string('combustivel'); 
            $table->string('arCondicionado');         
            $table->string('imagem'); 
            $table->integer('numeroReservas');
            $table->integer('active');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');       
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
        Schema::dropIfExists('carros');
    }
}
