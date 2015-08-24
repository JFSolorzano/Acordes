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

            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60)->nullable();
            $table->string('avatar')->nullable();
            $table->integer('facebook_id')->unique()->nullable();
            $table->tinyInteger('type')->unsigned();
            $table->dateTime('lastLogin');
            $table->tinyInteger('logeado')->unsigned();
            $table->rememberToken();
            $table->timestamps();
		});
        DB::statement('ALTER TABLE users ADD location POINT');
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
