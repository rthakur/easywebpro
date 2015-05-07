<?php

class TeamSeeder extends Seeder
{	protected $data = array(
		array(
			"image" => "img/team/1.jpg",
			"name" => "Kay Garland",
			"designation" => "Lead Designer",
			"facebook_link" => "",
			"twitter_link" => "",
			"linkedin_link" => ""
		),
		array(
			"image" => "img/team/2.jpg",
			"name" => "Larry Parker",
			"designation" => "Lead Marketer",
			"facebook_link" => "",
			"twitter_link" => "",
			"linkedin_link" => ""
		),
		array(
			"image" => "img/team/3.jpg",
			"name" => "Diana Pertersen",
			"designation" => "Lead Developer",
			"facebook_link" => "",
			"twitter_link" => "",
			"linkedin_link" => ""
		)
	);

	public function run()
	{	foreach ($this->data as $val)
			TeamModel::create($val);
	}
}

?>
