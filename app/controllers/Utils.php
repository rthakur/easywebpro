<?php

class Utils
{	public static function fetch_assoc($data, $col_name)
	{	$res = array();

		foreach ($data as $x)
			$res[$x[$col_name]] = $x;

		return $res;
	}

	public static function image_fetch_save($name, $size_x, $size_y)
	{	$file = Input::file($name);

		$destination = public_path().'/assets/fileupload/images';
		$filename = str_random(6) . '_' . 
				$file->getClientOriginalName();

		try
		{	$file->move($destination, $filename);
			$img = Image::make($destination.'/'.$filename);
			
				if($size_x=='1900' && $size_y=='1250'){
						//resize image to fit into the container
						$img->resize($size_x*2, null, function($constraint){
						  $constraint->aspectRatio();
						});
						if($img->height() < $size_y*2){
							$img->resize(null, $size_y*2, function($constraint){
								$constraint->aspectRatio();
							});
						  }
				}else{
				 $img->resize($size_x, $size_y);
				}
				
				
				$img->save($destination.'/'.$filename);

			return "fileupload/images/".$filename;
		}
		catch (Exception $e)
		{	
		 return null;
		}
	}

	public static function format_date($date)
	{	return  date("Y-m-d", strtotime($date));
	}

	public static function checkDBConnection()
	{	try
		{	$currentDB=Config::get('database.connections.mysql.database');
			DB::connection()->getDatabaseName($currentDB);			

			#if database not found
			 if(!$currentDB)	
				return false;

			#Check Users Table
			count(User::first());

			return true; 			
		}
		catch(Exception $e)
		{	return false;
		}
	 }
	 
	 
	 public static function checkUserTable()
	 {	try
		{	$user = User::first();
			
			if (isset($user)) 
				return true;
			else
				return false;
		}
		catch(Exception $e)
		{	return false;	
		}
	 }

	public static function checkFileSystemPermissions()
	{	$errors = array();

		$storage = __DIR__."/../storage/";
		$fileupload = __DIR__."/../../assets/fileupload/images/";
		$config = __DIR__."/../config/";

		try
		{	file_put_contents($storage."test.test", "Test Data");
		}
		catch (Exception $e)
		{	$errors["storage"] = array($storage, "Read, Write");
		}

		try
		{	file_put_contents($fileupload."test.test", "Test Data");
		}
		catch (Exception $e)
		{	$errors["fileupload"] = array($fileupload, "Read, Write");
		}

		try
		{	file_put_contents($config."test.test", "Test Data");
		}
		catch (Exception $e)
		{	$errors["config"] = array($config, "Read, Write");
		}

		return $errors;
	}

	 public static function checkSMTPService()
	 {
		if(Config::get('mail.username')!="" && Config::get('mail.password')!="")
		return TRUE;
	  
	  return FALSE;
	 }
}

?>
