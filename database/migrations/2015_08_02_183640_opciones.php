<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Opciones extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opciones', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';

            $table->increments('id')->unsigned();
            $table->string('nombre',150);
            $table->string('extra',150);
            $table->string('descripcion',8000);
            $table->double('costo',5,2);
            $table->string('imagen',500);
            $table->integer('menu')->unsigned();
            $table->timestamps();

            $table->foreign('menu')
                ->references('id')
                ->on('menus')
                ->onDelete('restrict')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('opciones');
    }

}

