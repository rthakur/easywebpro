<?php

class TeamModel extends Eloquent
{	protected $table = "team";

	public static $rules = array(
		"image" => "required",
		"name" => "required|min:2",
		"designation" => "required|min:2",
	);

	public static function validate($data)
	{	return Validator::make($data, self::$rules);
	}
}

?>
