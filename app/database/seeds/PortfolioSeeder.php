<?php

class PortfolioSeeder extends Seeder
{	protected $data = array(
		array(
			"image" => "img/portfolio/roundicons.png",
			"title" => "Round Icons",
			"category" => "Graphic Design"
		),
		array(
			"image" => "img/portfolio/startup-framework.png",
			"title" => "Startup Framework",
			"category" => "Website Design"
		),
		array(
			"image" => "img/portfolio/treehouse.png",
			"title" => "Treehouse",
			"category" => "Website Design"
		),
		array(
			"image" => "img/portfolio/golden.png",
			"title" => "Golden",
			"category" => "Website Design"
		),
		array(
			"image" => "img/portfolio/dreams.png",
			"title" => "Escape",
			"category" => "Website Design"
		),
		array(
			"image" => "img/portfolio/roundicons.png",
			"title" => "Dreams",
			"category" => "Website Design"
		)
	);

	public function run()
	{	foreach ($this->data as $val)
			PortfolioModel::create($val);
	}
}

?>
