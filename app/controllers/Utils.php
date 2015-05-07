<?php

class Utils
{	public static function fetch_assoc($data, $col_name)
	{	$res = array();

		foreach ($data as $x)
			$res[$x[$col_name]] = $x;

		return $res;
	}

	public static function image_fetch_save($name)
	{	$file = Input::file($name);

		$destination = public_path().'/assets/fileupload/images';
		$filename = str_random(6) . '_' . 
				$file->getClientOriginalName();

		if (!$file->move($destination, $filename))
			return null;
		else
			return "fileupload/images/".$filename;
	}

	public static function format_date($date)
	{	return  date("Y-m-d", strtotime($date));
	}
}

?>
