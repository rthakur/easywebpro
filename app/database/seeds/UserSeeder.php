<?php

class UserSeeder extends Seeder
{	protected $data = array(
		array(
			"email"=>"ravimalik2364@gmail.com",
			"password"=>'$2y$10$ObEvjDvJxlv7XA2Q815C3O8uHIRggpS5FnUawCf/iTNqcR67eVyjq',
			"first_name"=>"Ravi",
			"last_name"=>"Malik",
		)
	);

	public function run()
	{	foreach ($this->data as $val)
			User::create($val);
	}
}

?>
