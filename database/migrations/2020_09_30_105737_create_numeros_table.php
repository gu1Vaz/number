<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNumerosTable extends Migration
{

    public function up()
    {
        Schema::create('numeros', function (Blueprint $table) {
            $table->id();
            $table->string('ref');
            $table->integer('pais');
            $table->integer('ddd');
            $table->integer('numero');
            $table->enum('tipo', ['comercial', 'personal']);
            $table->foreignId('grupo_id')->references('id')->on('grupos')->onDelete('cascade')->OnUpdate('cascade');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->OnUpdate('cascade');
            $table->string('image_url');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('numeros');
    }
}
