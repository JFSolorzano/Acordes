<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Promociones extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promociones', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';

            $table->increments('id')->unsigned();
            $table->string('nombre',150);
            $table->string('descripcion',8000);
            $table->string('imagen',500);
            $table->dateTime('inicio');
            $table->dateTime('fin');
            $table->tinyInteger('estado')->unsigned();
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
        Schema::drop('promociones');
    }

}
