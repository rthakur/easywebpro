<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', "HomeController@home");

Route::get('/admin', array(
	"before"=>'auth', "uses"=>"AdminController@home",
	"as"=>"admin_home"));


Route::get('/admin/login', array(
	"uses"=>"AdminController@login", "as"=>"admin_login"));
Route::post("/authenticate", "AdminController@authenticate");
Route::get('/admin/logout', "AdminController@logout");

Route::group(array("before"=>"auth"), function ()
{	
	Route::get("/admin/services", "ServicesController@view");
	Route::post("/admin/services/delete", "ServicesController@delete");
	Route::post("/admin/services/add", "ServicesController@add");
	Route::post("/admin/services/update", "ServicesController@update");

	Route::get("/admin/portfolio", "PortfolioController@view");
	Route::post("/admin/portfolio/delete",
		"PortfolioController@delete");
	Route::post("/admin/portfolio/add", "PortfolioController@add");
	Route::post("/admin/portfolio/update",
		"PortfolioController@update");

	Route::get("/admin/about", "AboutController@view");
	Route::post("/admin/about/delete", "AboutController@delete");
	Route::post("/admin/about/add", "AboutController@add");
	Route::post("/admin/about/update", "AboutController@update");

	Route::get("/admin/team", "TeamController@view");
	Route::post("/admin/team/delete", "TeamController@delete");
	Route::post("/admin/team/add", "TeamController@add");
	Route::post("/admin/team/update", "TeamController@update");

	Route::get("/admin/contact", "ContactController@view");

});

?>
