<?php

class ContactModel extends Eloquent
{	protected $table = "contact";

	public static $rules = array(
		"name"=>"required:min:2",
		"email"=>"required:email",
		"phone"=>"required|regex:/^([0-9\s\-\+\(\)]*)$/",
		"message"=>"required",
	);

	public static function validate($data)
	{	return Validator::make($data, self::$rules);
	}
}

?>
