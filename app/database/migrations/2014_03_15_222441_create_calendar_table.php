<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalendarTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('calendar', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('type', 255);
			$table->string('name', 255);
			$table->string('details', 255)->nullable();
			$table->string('description', 255)->nullable();
			$table->date('date_from')->nullable();
			$table->date('date_to')->nullable();
			$table->string('contact', 255)->nullable();
			$table->string('street', 255)->nullable();
			$table->string('number', 255)->nullable();
			$table->string('latitude', 255)->nullable();
			$table->string('longitude', 255)->nullable();
			$table->string('phone', 255)->nullable();
			$table->string('email', 255)->nullable();
			$table->string('uri', 255)->nullable();
			$table->string('image_small', 255)->nullable();
			$table->string('image', 255)->nullable();
			$table->string('prices', 255)->nullable();
			$table->string('visitgent_id', 255)->nullable();
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
		// Drop the table
		Schema::drop('calendar');
	}

}