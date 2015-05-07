<?php

class PortfolioModel extends Eloquent
{	protected $table = "portfolio";

	public static $rules = array(
		"image" => "required",
		"title" => "required|min:2",
		"category" => "required|min:2"
	);

	public static function validate($data)
	{	return Validator::make($data, self::$rules);
	}
}

?>
