<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Respuestas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('respuestas', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';


            $table->increments('id')->unsigned();
			$table->integer('solicitud')->unsigned();
			$table->integer('reservacion')->unsigned();
			$table->tinyInteger('usuario');
			$table->text('mensaje');
			$table->dateTime('fechayhora');

            $table->foreign('solicitud')
                ->references('id')
                ->on('solicitudes')
                ->onUpdate('cascade')
                ->onDelete('cascade');

			$table->foreign('reservacion')
				->references('id')
				->on('reservaciones')
				->onUpdate('cascade')
				->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('respuestas');
	}

}
