<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AboutDuration extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('about', function ($table)
		{	$table->dropColumn('duration');
			$table->date('to');
			$table->date('from');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('about', function ($table)
		{	$table->dropColumn('to');
			$table->dropColumn('from');
			$table->string('duration');
		});
	}

}
