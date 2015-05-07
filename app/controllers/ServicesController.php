<?php

class ServicesController extends BaseController
{	public function view()
	{	$data = array();

		$menu = MenuModel::all();
		if (count($menu) > 0)
			$data['menu'] = Utils::fetch_assoc($menu, "title");

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
			return Redirect::to('/admin/services')
				->withErrors($validation);

		$service = new ServicesModel;
		$service->image = Input::get('icon');
		$service->title = Input::get('title');
		$service->description = Input::get('description');
		$service->save();

		return Redirect::to('/admin/services');
	}

	public function update()
	{	$rules = array(
			"id" => "required",
			"title" => "required|min:2",
			"description" => "required|min:10"
		);

		$validation = Validator::make(Input::all(), $rules);

		if ($validation->fails())
			return Redirect::to('/admin/services')
				->withErrors($validation);

		$service = ServicesModel::find(Input::get('id'));
		$service->title = Input::get('title');
		$service->description = Input::get('description');
		if (Input::hasFile('image'))
			$service->image = Utils::image_fetch_save('image');

		$service->save();

		return Redirect::to('/admin/services');
	}
}

?>
