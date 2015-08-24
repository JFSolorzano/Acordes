<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Mesas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mesas', function(Blueprint $table)
		{
            $table->engine = 'InnoDB';

			$table->increments('id')->unsigned();
			$table->integer('numero')->unsigned();
			$table->text('foto');
            $table->text('nombre');
            $table->integer('personas')->unsigned();
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
		Schema::drop('mesas');
	}

}
