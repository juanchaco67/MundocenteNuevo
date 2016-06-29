<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Funcionarios extends Migration
{
    public function up()
    {
        /**
     * Run the migrations.
     *
     * @return void
     */
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->integer('establecimiento_id')->unsigned();
            $table->foreign('establecimiento_id')
                ->references('id')
                ->on('establecimientos')
                ->onDelete('cascade');
            $table->string('telefono')->nullable();
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
        
        Schema::drop('funcionarios');   
    }
}
