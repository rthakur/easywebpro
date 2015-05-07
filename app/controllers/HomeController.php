<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function home()
	{	$data = array();

		$menu = MenuModel::all();
		if (count($menu) > 0)
			$data['menu'] = Utils::fetch_assoc($menu, 'title');

		$services = ServicesModel::all();
		if (count($services) > 0)
			$data['services'] = $services;

		$portfolio = PortfolioModel::all();
		if (count($portfolio) > 0)
			$data['portfolio'] = $portfolio;

		$about = AboutModel::orderBy('to', 'ASC')->get();
		if (count($about) > 0)
			$data['about'] = $about;

		$team = TeamModel::all();
		if (count($team) > 0)
			$data['team'] = $team;

		$clients = ClientsModel::all();
		if (count($clients) > 0)
			$data['clients'] = $clients;

		return View::make('home', $data);
	}

}
