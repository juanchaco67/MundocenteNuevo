<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Grupos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('grupos', function (Blueprint $table) {
            $table->integer('area_id')->unsigned();
            $table->integer('publicacion_id')->unsigned();

            $table->foreign('area_id')
                ->references('id')
                ->on('areas')->onDelete('cascade');
            $table->foreign('publicacion_id')
                ->references('id')
                ->on('publicaciones')->onDelete('cascade');

            $table->primary(array('area_id', 'publicacion_id'));
            $table->unique(array('area_id', 'publicacion_id'));
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
        Schema::drop('grupos');
    }
}
