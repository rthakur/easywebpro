<?php

class TeamSeeder extends Seeder
{	protected $data = array(
		array(
			"image" => "img/team/team_manager.png",
			"name" => "John",
			"designation" => "Team Manager",
			"facebook_link" => "",
			"twitter_link" => "",
			"linkedin_link" => ""
		),
		array(
			"image" => "img/team/team_developer.png",
			"name" => "Nick",
			"designation" => "Developer",
			"facebook_link" => "",
			"twitter_link" => "",
			"linkedin_link" => ""
		),
		array(
			"image" => "img/team/team_support.png",
			"name" => "Kelly",
			"designation" => "Support",
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
