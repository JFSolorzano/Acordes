<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Aue extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('aue', function(Blueprint $table)
		{
            $table->engine = 'InnoDB';

            $table->increments('id')->unsigned();
            $table->integer('usuario')->unsigned();
            $table->integer('registro')->unsigned();
            $table->integer('accion')->unsigned();
            $table->timestamps();

            $table->foreign('usuario')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('registro')
                ->references('id')
                ->on('empleados')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('accion')
                ->references('id')
                ->on('acciones')
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
		Schema::drop('aue');
	}

}
