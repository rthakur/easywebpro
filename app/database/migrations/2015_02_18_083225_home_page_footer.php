<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HomePageFooter extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('home_page', function ($table)
		{	$table->string("facebook_link");
			$table->string("twitter_link");
			$table->string("linkedin_link");
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('home_page', function ($table)
		{	$table->dropColumn('facebook_link');
			$table->dropColumn('twitter_link');
			$table->dropColumn('linkedin_link');
		});
	}

}
