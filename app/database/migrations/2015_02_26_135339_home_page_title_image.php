<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HomePageTitleImage extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('home_page', function ($table)
		{	$table->string('title_image')->nullable();
			$table->boolean('tile_image_active')->default(false);
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
		{	$table->dropColumn('title_image');
			$table->dropColumn('tile_image_active');
		});
	}

}
