<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Publicaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('publicaciones', function(Blueprint $table){
            $table->increments('id');
            $table->integer('funcionario_id')->unsigned();
            $table->foreign('funcionario_id')
                ->references('id')
                ->on('funcionarios')
                ->onDelete('cascade');
            $table->string('nombre');
            $table->string('descripcion');
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
        //
        Schema::drop('publicaciones');
    }
}
