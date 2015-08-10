<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Clientes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clientes', function(Blueprint $table)
		{
            $table->engine = 'InnoDB';

            $table->increments('id')->unsigned();
            $table->string('usuario',20)->unique();
            $table->string('email',20)->unique();
            $table->string('contrasena',60);
            $table->string('nombres',100);
            $table->string('apellidos',100);
            $table->integer('dui')->unsigned();
            $table->rememberToken();
            $table->dateTime('ultimaSesion');
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
		Schema::drop('clientes');
	}

}
