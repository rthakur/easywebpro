<?php

class MenuSeeder extends Seeder
{	protected $data = array(
		array(
			"title"=>"services",
			"display_name"=>"services",
			"description"=>"Lorem ipsum dolor sit amet consectetur.",
			"link"=>"services"
		),
		array(
			"title"=>"portfolio",
			"display_name"=>"portfolio",
			"description"=>"Lorem ipsum dolor sit amet consectetur.",
			"link"=>"portfolio"
		),
		array(
			"title"=>"about",
			"display_name"=>"about",
			"description"=>"Lorem ipsum dolor sit amet consectetur.",
			"link"=>"about"
		),
		array(
			"title"=>"team",
			"display_name"=>"our amazing team",
			"description"=>"Lorem ipsum dolor sit amet consectetur.",
			"link"=>"team"
		),
		array(
			"title"=>"contact",
			"display_name"=>"contact us",
			"description"=>"Lorem ipsum dolor sit amet consectetur.",
			"link"=>"contact"
		)
	);

	public function run()
	{	foreach($this->data as $val)
			MenuModel::create($val);
	}
}

?>
