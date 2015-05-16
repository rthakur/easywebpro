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


Route::get('/', array("uses"=>"HomeController@home", "before"=>"installation"));
Route::post('/contact/add', "ContactController@add");
Route::get('/getPage', "HomeController@getPage");

Route::get('/terms', "HomeController@terms");
Route::get('/policy', "HomeController@policy");

Route::get('/admin', array(
	"before"=>'auth|installation', "uses"=>"AdminController@home",
	"as"=>"admin_home"));

Route::group( array("prefix"=>"/admin", "before"=>"auth"), function ()
{	Route::get('get', "AdminController@get");
	Route::post('put', "AdminController@put");

	Route::post('background/update', "AdminController@bg_update");
	Route::post('sections/active', "AdminController@section_activate");
	Route::get('sections/deletesection', "AdminController@deletesection");

	Route::get('pages/terms', "AdminController@get_terms");
	Route::get('pages/policy', "AdminController@get_policy");
	Route::post('pages/save', "AdminController@saveHtmlPage");
	Route::post('pages/visible', "AdminController@htmlPageVisibility");

	Route::post('skin/set', "AdminController@skin_set");

	Route::post('sections/enable', "AdminController@sections_enable");

	Route::post('title/image', "AdminController@titleImage");
});


Route::group(array("prefix"=>"installation"), function ()
{	Route::get("db", "InstallationController@db");
	Route::post("db_configure", "InstallationController@configure_db");

	Route::get("user", "InstallationController@user");
	Route::post("user_configure",
		"InstallationController@configure_user");

	Route::get("permissions", "InstallationController@check_perms");
});

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
	Route::post("/admin/services/validate",
		"ServicesController@validate");
	Route::post("/admin/services/validate_update",
		"ServicesController@validate_update");
	Route::get('/admin/services/get', "ServicesController@get");
	Route::post('/admin/services/put', "ServicesController@put");

	Route::get("/admin/portfolio", "PortfolioController@view");
	Route::post("/admin/portfolio/delete",
		"PortfolioController@delete");
	Route::post("/admin/portfolio/add", "PortfolioController@add");
	Route::post("/admin/portfolio/update",
		"PortfolioController@update");
	Route::post("/admin/portfolio/validate",
		"PortfolioController@validate");
	Route::post("/admin/portfolio/validate_update",
		"PortfolioController@validate_update");
	Route::get('/admin/portfolio/get', "PortfolioController@get");
	Route::post('/admin/portfolio/put', "PortfolioController@put");

	Route::get("/admin/about", "AboutController@view");
	Route::post("/admin/about/delete", "AboutController@delete");
	Route::post("/admin/about/add", "AboutController@add");
	Route::post("/admin/about/update", "AboutController@update");
	Route::post("/admin/about/validate",
		"AboutController@validate");
	Route::post("/admin/about/validate_update",
		"AboutController@validate_update");
	Route::get('/admin/about/get', "AboutController@get");
	Route::post('/admin/about/put', "AboutController@put");
	Route::post('/admin/about/saveHtml', 'AboutController@saveHtml');
	Route::post('/admin/about/toggleHtmlActive', 'AboutController@toggleHtmlActive');

	Route::get("/admin/team", "TeamController@view");
	Route::post("/admin/team/delete", "TeamController@delete");
	Route::post("/admin/team/add", "TeamController@add");
	Route::post("/admin/team/update", "TeamController@update");
	Route::post("/admin/team/validate",
		"TeamController@validate");
	Route::post("/admin/team/validate_update",
		"TeamController@validate_update");
	Route::get('/admin/team/get', "TeamController@get");
	Route::post('/admin/team/put', "TeamController@put");

	Route::get("/admin/contact", "ContactController@view");
	Route::get('/admin/contact/get', "ContactController@get");
	Route::post('/admin/contact/put', "ContactController@put");

	Route::post('/admin/menuorder', "HomeController@menuorder");

	Route::post('/admin/section/add', "AdminController@addSection");
	Route::get('/admin/section/{id}', "AdminController@viewSection");
	Route::post('/admin/section/{id}/save', "AdminController@saveSection");
	
	Route::post('admin/updatemetatags', "AdminController@updateMetaTags");

});

?>
