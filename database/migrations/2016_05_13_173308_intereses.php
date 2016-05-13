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
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('area_id')
                ->references('id')
                ->on('areas')->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')->onDelete('cascade');

            $table->primary(array('area_id', 'user_id'));
            $table->unique(array('area_id', 'user_id'));
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
