<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HomeFontSizeMigration extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table("home_page", function ($table)
		{	$table->string("heading_size");
			$table->string("heading_color");
			$table->string("sub_heading_size");
			$table->string("sub_heading_color");
			$table->string("header_image_height");
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table("home_page", function ($table)
		{	$table->dropColumn("heading_size");
			$table->dropColumn("heading_color");
			$table->dropColumn("sub_heading_size");
			$table->dropColumn("sub_heading_color");
			$table->dropColumn("header_image_height");
		});
	}

}
