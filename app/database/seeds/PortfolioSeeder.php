<?php

class PortfolioSeeder extends Seeder
{	protected $data = array(
		array(
			"image" => "img/portfolio/1.png",
			"title" => "lorem ipsum",
			"category" => "Graphic Design",
			"url"	=> "http://example.com"
		),
		array(
			"image" => "img/portfolio/2.png",
			"title" => "lorem ipsum",
			"category" => "Website Design",
			"url"	=> "http://example.com"
		),
		array(
			"image" => "img/portfolio/3.png",
			"title" => "lorem ipsum",
			"category" => "Website Design",
			"url"	=> "http://example.com"
		),
		array(
			"image" => "img/portfolio/4.png",
			"title" => "lorem ipsum",
			"category" => "Website Design",
			"url"	=> "http://example.com"
		),
		array(
			"image" => "img/portfolio/5.png",
			"title" => "lorem ipsum",
			"category" => "Website Design",
			"url"	=> "http://example.com"
		),
		array(
			"image" => "img/portfolio/1.png",
			"title" => "lorem ipsum",
			"category" => "Website Design",
			"url"	=> "http://example.com"
		)
	);

	public function run()
	{	foreach ($this->data as $val)
			PortfolioModel::create($val);
	}
}

?>
