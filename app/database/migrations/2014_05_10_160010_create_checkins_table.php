<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckinsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('checkins', function(Blueprint $table)
		{
			$table->increments('id');
	        $table->integer('user_id')->unsigned()->index();
	        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
	        $table->integer('poi_id')->unsigned()->index();
	        $table->foreign('poi_id')->references('id')->on('poi')->onDelete('cascade');
	        $table->string('longitude');
	        $table->string('latitude');
	        $table->string('message');
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
		Schema::drop('checkins');
	}

}
