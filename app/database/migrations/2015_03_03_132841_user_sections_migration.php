<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserSectionsMigration extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_sections', function ($table)
		{	$table->increments('id');
			$table->text('html');
			$table->integer('menu_id')->unsigned()->nullable();
			$table->foreign('menu_id')->references('id')->on('menu');
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
		Schema::drop('user_sections');
	}

}
