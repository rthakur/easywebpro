<?php

class HomePageSeeder extends Seeder
{	protected $data = array(
		array(
			"heading" 				=> "Welcome To EasyWebPro",
			"sub_heading" 			=> "Fast, Easy And Simple To Use!",
			"image" 				=> "img/header-bg.png",
			"title" 				=> "EasyWebPro",
			"heading_size" 			=> "20",
			"sub_heading_size" 		=> "30",
			"header_image_height" 	=> "600",
		)
	);

	public function run()
	{	foreach ($this->data as $val)
			HomePageModel::create($val);
	}
}

?>
