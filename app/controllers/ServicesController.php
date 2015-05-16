<?php

class ServicesController extends BaseController
{	public function view()
	{	$data = array();

		$menu = MenuModel::orderBy('display_order')->get();
		if (count($menu) > 0)
			$data['menu'] = Utils::fetch_assoc($menu, 'title');

		$user_menu = MenuModel::where("user_created", "=", true)
			->orderBy("display_order")->get();
		if (count($user_menu) > 0)
			$data['user_menu'] = Utils::fetch_assoc($user_menu, 'title');

		$services = ServicesModel::all();
		if (count($services) > 0)
			$data['services'] = $services;

		return View::make('admin.services', $data);
	}

	public function delete()
	{	$id = Input::get("delete_id");

		ServicesModel::destroy($id);

		return Redirect::back();
	}

	public function add()
	{	$validation = ServicesModel::validate(Input::all());

		if ($validation->fails())
			return Redirect::to(URL::to('/admin/services'))
				->withErrors($validation);

		$service = new ServicesModel;
		$service->image = Input::get('icon');
		$service->title = Input::get('title');
		$service->description = Input::get('description');
		$service->save();

		return Redirect::to(URL::to('/admin/services'));
	}

	public function update()
	{	$rules = array(
			"id" => "required",
			"title" => "required|min:2",
			"description" => "required|min:10"
		);

		$validation = Validator::make(Input::all(), $rules);

		if ($validation->fails())
			return Redirect::to(URL::to('/admin/services'))
				->withErrors($validation);

		$service = ServicesModel::find(Input::get('id'));
		$service->title = Input::get('title');
		$service->description = Input::get('description');
		if (Input::has('icon'))
			$service->image = Input::get('icon');

		$service->save();

		return Redirect::to(URL::to('/admin/services'));
	}

	public function validate()
	{	$validation = ServicesModel::validate(Input::all());

		return Response::json($validation->messages()->toJson());
	}

	public function validate_update()
	{	$rules = array(
			"id" => "required",
			"title" => "required|min:2",
			"description" => "required|min:10"
		);

		$validation = Validator::make(Input::all(), $rules);

		return Response::json($validation->messages()->toJson());
	}

	public function get()
	{	$choice = Input::get('var');

		$service = MenuModel::where('title', '=', "services")->get();
		$service = $service[0];
		
		$data = "";

		if ($choice == "title")
			$data = $service->display_name;
		else if ($choice == "description")
			$data = $service->description;

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

		$service = MenuModel::where('title', '=', "services")->get();
		$service = $service[0];

		if (Input::has('title'))
			$service->display_name = Input::get('title');
		if (Input::has('description'))
			$service->description = Input::get('description');

		$service->save();

		return Redirect::to(URL::to('/admin/services'));
	}
}

?>
