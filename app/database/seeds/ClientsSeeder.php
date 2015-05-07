<?php

class ClientsSeeder extends Seeder
{	protected $data = array(
		array(
			"name" => "Envato",
			"image" => "img/logos/envato.jpg",
			"link" => ""
		),
		array(
			"name" => "Designmodo",
			"image" => "img/logos/designmodo.jpg",
			"link" => ""
		),
		array(
			"name" => "Themeforest",
			"image" => "img/logos/themeforest.jpg",
			"link" => ""
		),
		array(
			"name" => "Creative-Market",
			"image" => "img/logos/creative-market.jpg",
			"link" => ""
		)
	);

	public function run()
	{	foreach ($this->data as $val)
			ClientsModel::create($val);
	}
}

?>
