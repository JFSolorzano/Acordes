<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Datos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('datos', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';

            $table->increments('id')->unsigned();
            $table->string('nombre', 100);
            $table->string('contenido', 8000);
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
        Schema::drop('datos');
	}

}
