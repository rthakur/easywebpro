<?php

class ServicesModel extends Eloquent
{	protected $table = "services";

	public static $rules = array(
		"icon" => "required",
		"title" => "required|min:2",
		"description" => "required|min:10"
	);

	public static function validate($data)
	{	return Validator::make($data, self::$rules);
	}
}

?>
