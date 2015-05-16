<?php
class Helper{

	public static function getmetavalue($name){
		 $metaValue = Option::where('name', $name)->first();
		if($metaValue)
			return $metaValue->value;
		else
			return '';
	} 
	
	
}

?>