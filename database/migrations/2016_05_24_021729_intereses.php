<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Intereses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('intereses', function(Blueprint $table){
            $table->integer('area_id')->unsigned();
            $table->integer('docente_id')->unsigned();
            $table->foreign('area_id')
                ->references('id')
                ->on('areas')->onDelete('cascade');
            $table->foreign('docente_id')
                ->references('id')
                ->on('docentes')->onDelete('cascade');

            $table->primary(array('area_id', 'docente_id'));
            $table->unique(array('area_id', 'docente_id'));
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
        Schema::drop('intereses');
    }
}
