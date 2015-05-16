<?php

class HomePageModel extends Eloquent
{	protected $table = "home_page";

	protected $fillable = array("heading", "sub_heading", "title");
}

?>
