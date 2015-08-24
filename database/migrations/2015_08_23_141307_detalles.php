<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Detalles extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mesasreservadas', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';

			$table->integer('reservacion')->unsigned();
			$table->integer('mesa')->unsigned();

            $table->foreign('reservacion')
                ->references('id')
                ->on('reservaciones')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('mesa')
                ->references('id')
                ->on('mesas')
                ->onUpdate('cascade')
                ->onDelete('restrict');
		});

		Schema::create('platosreservados', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';

            $table->integer('reservacion')->unsigned();
            $table->integer('plato')->unsigned();

            $table->foreign('reservacion')
                ->references('id')
                ->on('reservaciones')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('plato')
                ->references('id')
                ->on('Opciones')
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
		Schema::drop('mesasreservadas');
		Schema::drop('platosreservados');
	}

}
