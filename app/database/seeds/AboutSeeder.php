<?php

class AboutSeeder extends Seeder
{	protected $data = array(
		array(
			"image" => "img/about/1.jpg",
			"from" => "2009-01-01",
			"to" => "2011-01-01",
			"title" => "Our Humble Beginnings",
			"description" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!",
		),
		array(
			"image" => "img/about/2.jpg",
			"to" => "2011-03-01",
			"title" => "An Agency is Born",
			"description" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!",
		),
		array(
			"image" => "img/about/3.jpg",
			"to" => "2012-12-01",
			"title" => "Transition to Full Service",
			"description" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!",
		),
		array(
			"image" => "img/about/4.jpg",
			"to" => "2014-07-01",
			"title" => "Phase Two Expansion",
			"description" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!",
		)
	);

	public function run()
	{	foreach ($this->data as $val)
			AboutModel::create($val);
	}
}

?>
