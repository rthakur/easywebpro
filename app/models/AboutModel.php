<?php

class AboutModel extends Eloquent
{	protected $table = "about";

	public static $rules = array(
		"image"=>"required",
		"title"=>"required|min:2",
		"description"=>"required|min:10",
		"from"=>"date",
		"to"=>'required|date_format:"m/d/Y"'
	);

	public static function validate($data)
	{	return Validator::make($data, self::$rules);
	}
}

?>
