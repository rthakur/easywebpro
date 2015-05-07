<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Team extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('team', function ($table)
		{	$table->increments('id');
			$table->string('image');
			$table->string('name');
			$table->string('designation');
			$table->string('facebook_link');
			$table->string('twitter_link');
			$table->string('linkedin_link');
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
		Schema::drop('team');
	}

}
