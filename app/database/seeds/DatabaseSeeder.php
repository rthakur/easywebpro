<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('MenuSeeder');
		$this->call('ServicesSeeder');
		$this->call('PortfolioSeeder');
		$this->call('AboutSeeder');
		$this->call('TeamSeeder');
		$this->call('ClientsSeeder');
		$this->call('HomePageSeeder');
		$this->call('SkinsSeeder');
		$this->call('HtmlPagesSeeder');
		$this->call('OptionTableSeeder');
	}

}
