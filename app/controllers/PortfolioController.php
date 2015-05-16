<?php

class PortfolioController extends BaseController
{	public function view()
	{	$data = array();

		$menu = MenuModel::orderBy('display_order')->get();
		if (count($menu) > 0)
			$data['menu'] = Utils::fetch_assoc($menu, 'title');

		$user_menu = MenuModel::where("user_created", "=", true)
			->orderBy("display_order")->get();
		if (count($user_menu) > 0)
			$data['user_menu'] = Utils::fetch_assoc($user_menu, 'title');

		$portfolio = PortfolioModel::all();
		if (count($portfolio) > 0)
			$data['portfolio'] = $portfolio;

		return View::make('admin.portfolio', $data);
	}

	public function delete()
	{	$id = Input::get("delete_id");

		PortfolioModel::destroy($id);

		return Redirect::back();
	}

	public function add()
	{	$validation = PortfolioModel::validate(Input::all());

		if ($validation->fails())
			return Redirect::to(URL::to('/admin/portfolio'))
				->withErrors($validation);

		$portfolio = new PortfolioModel;
		$portfolio->image = Utils::image_fetch_save('image', 400, 289);
		$portfolio->title = Input::get('title');
		$portfolio->category = Input::get('category');
		$portfolio->url = Input::get('url');
		$portfolio->save();

		return Redirect::to(URL::to('/admin/portfolio'));
	}

	public function update()
	{	$rules = array(
			"id" => "required",
			"title" => "required|min:2",
			"category" => "required|min:2",
			"url" => "required"
		);

		$validation = Validator::make(Input::all(), $rules);

		if ($validation->fails())
			return Redirect::to(URL::to('/admin/portfolio'))
				->withErrors($validation);

		$portfolio = PortfolioModel::find(Input::get('id'));
		$portfolio->title = Input::get('title');
		$portfolio->category = Input::get('category');
		$portfolio->url = Input::get('url');
		if (Input::hasFile('image'))
			$portfolio->image = Utils::image_fetch_save('image', 400, 289);

		$portfolio->save();

		return Redirect::to(URL::to('/admin/portfolio'));
	}

	public function validate()
	{	$validation = PortfolioModel::validate(Input::all());

		return Response::json($validation->messages()->toJson());
	}

	public function validate_update()
	{	$rules = array(
			"id" => "required",
			"title" => "required|min:2",
			"category" => "required|min:2",
			"url" => "required"
		);

		$validation = Validator::make(Input::all(), $rules);

		return Response::json($validation->messages()->toJson());
	}

	public function get()
	{	$choice = Input::get('var');

		$portfolio = MenuModel::where('title', '=', "portfolio")->get();
		$portfolio = $portfolio[0];
		
		$data = "";

		if ($choice == "title")
			$data = $portfolio->display_name;
		else if ($choice == "description")
			$data = $portfolio->description;

		return Response::json('{"res":"'.$data.'"}');
	}

	public function put()
	{	$rules = array(
			"title"=>"min:2",
			"description"=>"min:2"
		);

		$validation = Validator::make(Input::all(), $rules);
		if ($validation->fails())
			return Redirect::to(URL::to('/admin'));

		$portfolio = MenuModel::where('title', '=', "portfolio")->get();
		$portfolio = $portfolio[0];

		if (Input::has('title'))
			$portfolio->display_name = Input::get('title');
		if (Input::has('description'))
			$portfolio->description = Input::get('description');

		$portfolio->save();

		return Redirect::to(URL::to('/admin/portfolio'));
	}
}

?>
