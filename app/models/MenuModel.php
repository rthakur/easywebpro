<?php

class MenuModel extends Eloquent
{	protected $table = "menu";

	protected $fillable = array('title', 'display_name', 
		'description', 'link');
}

?>
