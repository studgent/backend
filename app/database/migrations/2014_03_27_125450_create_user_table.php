<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('email', 255)->unique();
			$table->string('token', 255);
			$table->string('password', 255);
			$table->string('first_name', 255);
			$table->string('last_name', 255);
			$table->string('details', 255)->nullable();
			$table->string('phone', 255)->nullable();
			$table->string('image', 255)->nullable();
			$table->timestamps();
		});

	    Schema::create('user_friends', function(Blueprint $table) {
	        $table->increments('id');
	        $table->integer('friend_id')->unsigned()->index();
	        $table->integer('user_id')->unsigned()->index();
	        $table->foreign('friend_id')->references('id')->on('users')->onDelete('cascade');
	        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
	    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user');
		Schema::drop('user_friends');
	}

}
