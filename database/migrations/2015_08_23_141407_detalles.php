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
            $table->timestamps();

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

		Schema::create('opcionesreservadas', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';

            $table->integer('reservacion')->unsigned();
            $table->integer('opcion')->unsigned();
            $table->integer('cantidad')->unsigned();
            $table->timestamps();

            $table->foreign('reservacion')
                ->references('id')
                ->on('reservaciones')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('opcion')
                ->references('id')
                ->on('Opciones')
                ->onUpdate('cascade')
                ->onDelete('restrict');
		});


        Schema::create('serviciossolicitados', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';

            $table->integer('solicitud')->unsigned();
            $table->integer('servicio')->unsigned();
            $table->timestamps();

            $table->foreign('solicitud')
                ->references('id')
                ->on('solicitudes')
                ->onUpdate('cascade')
                ->onDelete('cascade');

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
		Schema::drop('mesasreservadas');
		Schema::drop('platosreservados');
		Schema::drop('serviciossolicitados');
	}

}
