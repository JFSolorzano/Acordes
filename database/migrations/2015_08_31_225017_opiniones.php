<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Opiniones extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('opiniones', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';


			$table->increments('id')->unsigned();
			$table->integer('cliente')->unsigned();
			$table->text('mensaje');
            $table->tinyInteger('estado');
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
		Schema::drop('opiniones');
	}

}
