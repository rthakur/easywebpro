<?php

class TeamController extends BaseController
{	public function view()
	{	$data = array();

		$menu = MenuModel::all();
		if (count($menu) > 0)
			$data['menu'] = Utils::fetch_assoc($menu, "title");

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
			return Redirect::to('/admin/portfolio')
				->withErrors($validation);

		$team = new TeamModel;
		$team->image = Utils::image_fetch_save('image');
		$team->name = Input::get('name');
		$team->designation = Input::get('designation');
		$team->facebook_link = '';
		$team->linkedin_link = '';
		$team->twitter_link = '';
		$team->save();

		return Redirect::to('/admin/team');
	}

	public function update()
	{	$rules = array(
			"id" => "required",
			"name" => "required|min:2",
			"designation" => "required|min:2"
		);

		$validation = Validator::make(Input::all(), $rules);

		if ($validation->fails())
			return Redirect::to('/admin/team')
				->withErrors($validation);

		$team = TeamModel::find(Input::get('id'));
		$team->name = Input::get('name');
		$team->designation = Input::get('designation');
		if (Input::hasFile('image'))
			$team->image = Utils::image_fetch_save('image');

		$team->save();

		return Redirect::to('/admin/team');
	}
}

?>
