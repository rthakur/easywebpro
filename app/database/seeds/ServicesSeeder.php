<?php

class ServicesSeeder extends Seeder
{	protected $data = array(
		array(
			"image" => "fa-shopping-cart",
			"title" => "E-Commerce",
			"description" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit."
		),
		array(
			"image" => "fa-laptop",
			"title" => "Responsive Design",
			"description" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit."
		),
		array(
			"image" => "fa-lock",
			"title" => "Web Security",
			"description" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit."
		)
	);

	public function run()
	{	foreach ($this->data as $val)
			ServicesModel::create($val);
	}
}

?>
