<?php

class MenuSeeder extends Seeder
{	protected $data = array(
		array(
			"title"=>"services",
			"display_name"=>"services",
			"description"=>"Lorem ipsum dolor sit amet consectetur.",
			"link"=>"services",
			"display_order"=>"0"
		),
		array(
			"title"=>"portfolio",
			"display_name"=>"portfolio",
			"description"=>"Lorem ipsum dolor sit amet consectetur.",
			"link"=>"portfolio",
			"display_order"=>"1"
		),
		array(
			"title"=>"about",
			"display_name"=>"about",
			"description"=>"Lorem ipsum dolor sit amet consectetur.",
			"link"=>"about",
			"display_order"=>"2"
		),
		array(
			"title"=>"team",
			"display_name"=>"team",
			"description"=>"Lorem ipsum dolor sit amet consectetur.",
			"link"=>"team",
			"display_order"=>"3"
		),
		array(
			"title"=>"contact",
			"display_name"=>"contact",
			"description"=>"Lorem ipsum dolor sit amet consectetur.",
			"link"=>"contact",
			"display_order"=>"4"
		)
	);

	public function run()
	{	foreach($this->data as $val)
			MenuModel::create($val);
	}
}

?>
