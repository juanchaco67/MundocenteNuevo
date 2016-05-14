<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Docentes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('docentes', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->foreign('id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->boolean('notificar')->default(1);
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
        Schema::drop('docentes');
    }
}
