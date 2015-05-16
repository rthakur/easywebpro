<?php

class OptionTableSeeder extends Seeder
{	
protected $data = array(
		array(
			"name" => "page_title",
			"value" => "EasyWebPro"
		),
		array(
			"name" => "meta_description",
			"value" => "Create Professional Responsive Website Within Minutes"
		),
		array(
			"name" => "meta_content",
			"value" => "Fast, Easy And Simple To Use!"
		)
		,
		array(
			"name" => "meta_keyword",
			"value" => "Easy to customize. No Coding."
		)
	);

	public function run()
	{	foreach ($this->data as $val)
			Option::create($val);
	}
}

?>
