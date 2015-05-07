<?php

class AboutController extends BaseController
{	public function view()
	{	$data = array();

		$menu = MenuModel::all();
		if (count($menu) > 0)
			$data['menu'] = Utils::fetch_assoc($menu, "title");

		$about = AboutModel::orderBy('to', 'ASC')->get();
		if (count($about) > 0)
			$data['about'] = $about;

		return View::make('admin.about', $data);
	}

	public function delete()
	{	$id = Input::get("delete_id");

		AboutModel::destroy($id);

		return Redirect::back();
	}

	public function add()
	{	$validation = AboutModel::validate(Input::all());
		//echo "<pre>".print_r($validation->messages()->all()); die;
		if ($validation->fails())
			return Redirect::to('/admin/about')
				->withErrors($validation);

		$about = new AboutModel;
		$about->image = Utils::image_fetch_save('image');
		$about->title = Input::get('title');
		$about->description = Input::get('description');
		$about->to = Utils::format_date(Input::get('to'));
		if (Input::has('from'))
			$about->from = Utils::format_date(Input::get('from'));
		$about->save();

		return Redirect::to('/admin/about');
	}

	public function update()
	{	$rules = array(
			"id" => "required",
			"title" => "required|min:10",
			"description" => "required|min:2",
			"from"=>"date",
			"to"=>'required|date_format:"m/d/Y"'
		);

		$validation = Validator::make(Input::all(), $rules);

//echo "<pre>".print_r($validation->messages()->all());die;

		if ($validation->fails())
			return Redirect::to('/admin/about')
				->withErrors($validation);

		$about = AboutModel::find(Input::get('id'));
		$about->title = Input::get('title');
		$about->description = Input::get('description');
		$about->to = Utils::format_date(Input::get('to'));
		if (Input::has('from'))
			$about->from = Utils::format_date(Input::get('from'));
		if (Input::hasFile('image'))
			$about->image = Utils::image_fetch_save('image');

		$about->save();

		return Redirect::to('/admin/about');
	}
}

?>
