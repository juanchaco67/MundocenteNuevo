<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Aplicaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        //
         Schema::create('aplicaciones', function (Blueprint $table) {
            $table->integer('lugar_id')->unsigned();
            $table->integer('publicacion_id')->unsigned();

            $table->foreign('lugar_id')
                ->references('id')
                ->on('lugares')->onDelete('cascade');
            $table->foreign('publicacion_id')
                ->references('id')
                ->on('publicaciones')->onDelete('cascade');

            $table->primary(array('lugar_id', 'publicacion_id'));
            $table->unique(array('lugar_id', 'publicacion_id'));
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
        Schema::drop('aplicaciones');
    }
}
