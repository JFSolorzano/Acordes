<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Reservaciones extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reservaciones', function(Blueprint $table)
		{
            $table->engine = 'InnoDB';

			$table->increments('id')->unsigned();
			$table->integer('cliente')->unsigned();
			$table->integer('servicio')->unsigned();
            $table->text('mensaje');
            $table->integer('telefono')->unsigned();
            $table->dateTime('inicio');
            $table->dateTime('fin');
			$table->timestamps();

            $table->foreign('cliente')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('restrict');

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
		Schema::drop('reservaciones');
	}

}
