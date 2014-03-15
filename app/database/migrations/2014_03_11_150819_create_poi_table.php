<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoITable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('poi', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('type', 255);
			$table->string('name', 255);
			$table->string('details', 255)->nullable();
			$table->string('latitude', 255);
			$table->string('longitude', 255);
			$table->string('uri', 255)->nullable();
			$table->integer('cafeplan_id')->nullable();
			$table->string('cafeplan_uri', 255)->nullable();
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
		Schema::drop('poi');
	}

}