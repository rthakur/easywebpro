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

		$menu = MenuModel::where('active', '=', true)
				->orderBy('display_order')->get();
		if (count($menu) > 0)
		{	$data['menu'] = Utils::fetch_assoc($menu, 'title');

			if (array_key_exists('services', $data['menu']))
			{	$services = ServicesModel::all();
				if (count($services) > 0)
					$data['services'] = $services;
			}

			if (array_key_exists('portfolio', $data['menu']))
			{	$portfolio = PortfolioModel::all();
				if (count($portfolio) > 0)
					$data['portfolio'] = $portfolio;
			}

			if (array_key_exists('about', $data['menu']))
			{	$about = AboutModel::orderBy('to', 'ASC')->get();
				if (count($about) > 0)
					$data['about'] = $about;
			}

			if (array_key_exists('team', $data['menu']))
			{	$team = TeamModel::all();
				if (count($team) > 0)
					$data['team'] = $team;
			}

			if (array_key_exists('clients', $data['menu']))
			{	$clients = ClientsModel::all();
				if (count($clients) > 0)
					$data['clients'] = $clients;
			}
		}

		$home = HomePageModel::all();
		if (count($home) > 0)
		{	$home = $home[0];
			$data['home'] = $home;

			$skin_id = $home->skin;
			if ($skin_id != 0)
			{	$skin = SkinsModel::where("id", "=", $skin_id)->get();
				$skin = $skin[0];
				$data['skin_path'] = $skin->path;
			}
		}

		$about_html = HtmlPagesModel::where("url", "=", "about")->get();
		if (count($about_html) > 0)
		{	$about_html = $about_html[0];

			if ($about_html->active)
				$data['about_html'] = $about_html;
		}

		$html_pages = HtmlPagesModel::where("url", "=", "terms")
						->orWhere("url", "=", "policy")->get();
		if (count($html_pages) > 0)
			$data['html_pages'] = Utils::fetch_assoc($html_pages, 'url');

		return View::make('home', $data);
	}

	public function terms()
	{	$data = array();

		$menu = MenuModel::where('active', '=', true)->get();
		if (count($menu) > 0)
			$data['menu'] = Utils::fetch_assoc($menu, 'title');

		$home = HomePageModel::all();
		if (count($home) > 0)
		{	$data['home'] = $home[0];
			$home = $home[0];
			$skin_id = $home->skin;
			if ($skin_id != 0)
			{	$skin = SkinsModel::where("id", "=", $skin_id)->get();
				$skin = $skin[0];
				$data['skin_path'] = $skin->path;
			}
		}

		$html_pages = HtmlPagesModel::where("url", "=", "terms")
						->orWhere("url", "=", "policy")->get();
		if (count($html_pages) > 0)
			$data['html_pages'] = Utils::fetch_assoc($html_pages, 'url');

		$terms = HtmlPagesModel::where("url", "=", "terms")->get();
		if (count($terms) > 0)
			$data['html'] = $terms[0]->html;

		$data['html_page'] = true;

		return View::make("html_page", $data);
	}

	public function policy()
	{	$data = array();

		$menu = MenuModel::where('active', '=', true)->get();
		if (count($menu) > 0)
			$data['menu'] = Utils::fetch_assoc($menu, 'title');

		$home = HomePageModel::all();
		if (count($home) > 0)
		{	$data['home'] = $home[0];
			$home = $home[0];
			$skin_id = $home->skin;
			if ($skin_id != 0)
			{	$skin = SkinsModel::where("id", "=", $skin_id)->get();
				$skin = $skin[0];
				$data['skin_path'] = $skin->path;
			}
		}

		$html_pages = HtmlPagesModel::where("url", "=", "terms")
						->orWhere("url", "=", "policy")->get();
		if (count($html_pages) > 0)
			$data['html_pages'] = Utils::fetch_assoc($html_pages, 'url');

		$policy = HtmlPagesModel::where("url", "=", "policy")->get();
		if (count($policy) > 0)
			$data['html'] = $policy[0]->html;

		$data['html_page'] = true;

		return View::make("html_page", $data);
	}

	public function getPage()
	{	$choice = Input::get('choice');

		$obj = null;
		if ($choice == "terms")
			$obj = HtmlPagesModel::where("url", "=", "terms")->get();
		else if ($choice == "policy")
			$obj = HtmlPagesModel::where("url", "=", "policy")->get();

		if ($obj != null && count($obj) > 0)
		{	$obj = $obj[0];
			return $obj->html;
		}

		return null;
	}

	public function menuorder(){
		
		foreach(explode(',',Input::get('menuOrder')) as $key=>$value){
			$menu=MenuModel::find($value);
			$menu->display_order = $key;
			$menu->save();
		}

	}
}

?>
