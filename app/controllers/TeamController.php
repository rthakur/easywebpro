<?php

class TeamController extends BaseController
{	public function view()
	{	$data = array();

		$menu = MenuModel::orderBy('display_order')->get();
		if (count($menu) > 0)
			$data['menu'] = Utils::fetch_assoc($menu, 'title');

		$user_menu = MenuModel::where("user_created", "=", true)
			->orderBy("display_order")->get();
		if (count($user_menu) > 0)
			$data['user_menu'] = Utils::fetch_assoc($user_menu, 'title');

		$team = TeamModel::all();
		if (count($team) > 0)
			$data['team'] = $team;

		return View::make('admin.team', $data);
	}

	public function delete()
	{	$id = Input::get("delete_id");

		TeamModel::destroy($id);

		return Redirect::back();
	}

	public function add()
	{	$validation = TeamModel::validate(Input::all());

		if ($validation->fails())
			return Redirect::to(URL::to('/admin/team'))
				->withErrors($validation);

		$team = new TeamModel;
		$team->image = Utils::image_fetch_save('image', 225, 225);
		$team->name = Input::get('name');
		$team->designation = Input::get('designation');
		$team->facebook_link = '';
		$team->linkedin_link = '';
		$team->twitter_link = '';
		$team->save();

		return Redirect::to(URL::to('/admin/team'));
	}

	public function update()
	{	$rules = array(
			"id" => "required",
			"name" => "required|min:2",
			"designation" => "required|min:2"
		);

		$validation = Validator::make(Input::all(), $rules);

		if ($validation->fails())
			return Redirect::to(URL::to('/admin/team'))
				->withErrors($validation);

		$team = TeamModel::find(Input::get('id'));
		$team->name = Input::get('name');
		$team->designation = Input::get('designation');
		if (Input::hasFile('image'))
			$team->image = Utils::image_fetch_save('image', 225, 225);

		$team->save();

		return Redirect::to(URL::to('/admin/team'));
	}

	public function validate()
	{	$validation = TeamModel::validate(Input::all());

		return Response::json($validation->messages()->toJson());
	}

	public function validate_update()
	{	$rules = array(
			"id" => "required",
			"name" => "required|min:2",
			"designation" => "required|min:2"
		);

		$validation = Validator::make(Input::all(), $rules);

		return Response::json($validation->messages()->toJson());
	}

	public function get()
	{	$choice = Input::get('var');

		$team = MenuModel::where('title', '=', "team")->get();
		$team = $team[0];
		
		$data = "";

		if ($choice == "title")
			$data = $team->display_name;
		else if ($choice == "description")
			$data = $team->description;

		return Response::json('{"res":"'.$data.'"}');
	}

	public function put()
	{	$rules = array(
			"title"=>"min:2",
			"description"=>"min:2"
		);

		$validation = Validator::make(Input::all(), $rules);
		if ($validation->fails())
			return Redirect::to(URL::to('/admin/team'));

		$team = MenuModel::where('title', '=', "team")->get();
		$team = $team[0];

		if (Input::has('title'))
			$team->display_name = Input::get('title');
		if (Input::has('description'))
			$team->description = Input::get('description');

		$team->save();

		return Redirect::to(URL::to('/admin/team'));
	}
}

?>
