<?php

class SkinsSeeder extends Seeder
{	protected $data = array(
		array(
			"name" => "green",
			"path" => "/assets/css/skins/skin-green.css",
			"color" => "#76d11e",
		),
		array(
			"name" => "red",
			"path" => "/assets/css/skins/skin-red.css",
			"color" => "#d31919",
		),
		array(
			"name" => "purple",
			"path" => "/assets/css/skins/skin-purple.css",
			"color" => "#70389c",
		),
		array(
			"name" => "yellow",
			"path" => "/assets/css/skins/skin-yellow.css",
			"color" => "#fed136",
		),
	);

	public function run()
	{	foreach ($this->data as $val)
			SkinsModel::create($val);
	}
}

?>
