<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Solicitudes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('solicitudes', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';

            $table->increments('id')->unsigned();
			$table->integer('servicio')->unsigned();
			$table->text('especificaciones');
			$table->dateTime('fechayhora');
			$table->tinyInteger('estado');

            $table->foreign('servicio')
                ->references('id')
                ->on('servicios')
                ->onUpdate('cascade')
                ->onDelete('restrict');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('solicitudes');
	}

}
