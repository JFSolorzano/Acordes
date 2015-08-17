<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
            $table->engine = 'InnoDB';

			$table->increments('id')->unsigned();
			$table->string('username')->unique();
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->tinyInteger('type')->unsigned();
			$table->rememberToken();
            $table->dateTime('lastLogin');
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
		Schema::drop('users');
	}

}
