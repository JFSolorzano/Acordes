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
			$table->integer('personas')->unsigned();
			$table->tinyInteger('precocinado')->unsigned()->nullable();
			$table->tinyInteger('estado')->unsigned();
            $table->text('mensaje');
            $table->decimal('costoEstimado',7,2);
            $table->dateTime('inicio');
            $table->time('duracion');
			$table->timestamps();

            $table->foreign('cliente')
                ->references('id')
                ->on('users')
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
