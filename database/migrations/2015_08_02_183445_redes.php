<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Redes extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('redes', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';

            $table->increments('id')->unsigned();
            $table->string('nombre',50);
            $table->string('link',300);
            $table->string('icono',50);
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
        Schema::drop('redes');
    }

}