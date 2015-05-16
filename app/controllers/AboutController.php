<?php

class AboutController extends BaseController
{	public function view()
	{	$data = array();

		$menu = MenuModel::orderBy('display_order')->get();
		if (count($menu) > 0)
			$data['menu'] = Utils::fetch_assoc($menu, 'title');

		$user_menu = MenuModel::where("user_created", "=", true)
			->orderBy("display_order")->get();
		if (count($user_menu) > 0)
			$data['user_menu'] = Utils::fetch_assoc($user_menu, 'title');

		$about = AboutModel::orderBy('to', 'ASC')->get();
		if (count($about) > 0)
			$data['about'] = $about;

		$about_html = HtmlPagesModel::where('url', '=', 'about')->get();
		if (count($about_html) > 0)
		{	$data['html'] = $about_html[0]->html;
			$data['id'] = $about_html[0]->id;
			$data['active'] = $about_html[0]->active;
		}

		$data['save_url'] = 'about';

		return View::make('admin.about', $data);
	}

	public function delete()
	{	$id = Input::get("delete_id");

		AboutModel::destroy($id);

		return Redirect::back();
	}

	public function add()
	{	$validation = AboutModel::validate(Input::all());

		if ($validation->fails())
			return Redirect::to(URL::to('/admin/about'))
				->withErrors($validation);

		$about = new AboutModel;
		$about->image = Utils::image_fetch_save('image', 200, 200);
		$about->title = Input::get('title');
		$about->description = Input::get('description');
		$about->to = Utils::format_date(Input::get('to'));
		if (Input::has('from'))
			$about->from = Utils::format_date(Input::get('from'));
		$about->save();

		return Redirect::to(URL::to('/admin/about'));
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

		if ($validation->fails())
			return Redirect::to(URL::to('/admin/about'))
				->withErrors($validation);

		$about = AboutModel::find(Input::get('id'));
		$about->title = Input::get('title');
		$about->description = Input::get('description');
		$about->to = Utils::format_date(Input::get('to'));
		if (Input::has('from'))
			$about->from = Utils::format_date(Input::get('from'));
		if (Input::hasFile('image'))
			$about->image = Utils::image_fetch_save('image', 200, 200);

		$about->save();

		return Redirect::to(URL::to('/admin/about'));
	}

	public function validate()
	{	$validation = AboutModel::validate(Input::all());

		return Response::json($validation->messages()->toJson());
	}

	public function validate_update()
	{	$rules = array(
			"id" => "required",
			"title" => "required|min:10",
			"description" => "required|min:2",
			"from"=>"date",
			"to"=>'required|date_format:"m/d/Y"'
		);

		$validation = Validator::make(Input::all(), $rules);

		return Response::json($validation->messages()->toJson());
	}

	public function get()
	{	$choice = Input::get('var');

		$about = MenuModel::where('title', '=', "about")->get();
		$about = $about[0];
		
		$data = "";

		if ($choice == "title")
			$data = $about->display_name;
		else if ($choice == "description")
			$data = $about->description;

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

		$about = MenuModel::where('title', '=', "about")->get();
		$about = $about[0];

		if (Input::has('title'))
			$about->display_name = Input::get('title');
		if (Input::has('description'))
			$about->description = Input::get('description');

		$about->save();

		return Redirect::to(URL::to('/admin/about'));
	}

	public function saveHtml()
	{	$rules = array(
			"html"=>"required",
			"url"=>"required"
		);

		$validation = Validator::make(Input::all(), $rules);
		if ($validation->fails())
			return Redirect::back()
				->with("errors", $validation->messages()->all());

		$html = new HtmlPagesModel;		
		if (Input::has('id'))
		{	$html = HtmlPagesModel::where("id", "=", Input::get('id'))->get();
			$html = $html[0];
		}

		$html->html = Input::get('html');
		$html->url = Input::get('url');
		$html->save();

		return Redirect::to(URL::to('/admin/about'));
	}

	public function toggleHtmlActive()
	{	$html = HtmlPagesModel::where('url', "=", 'about')->get();

		if (count($html) > 0)
		{	$html = $html[0];
			$active = Input::get('active');
			$active = ($active == "true") ? true : false;

			$html->active = $active;
			$html->save();
			return "success";
		}

		return "failure";
	}
}

?>
