<?php

class AdminController extends BaseController
{	public function login()
	{	return View::make('auth.login');
	}

	public function logout()
	{	Auth::logout();

		return Redirect::route("admin_login");
	}

	public function authenticate()
	{	$validation = User::validate(Input::all());
		if ($validation->fails())
			return Redirect::route("admin_login")
				->withErrors($validation);

		$email = Input::get('email');
		$pwd = Input::get('password');
		$remember = Input::get('remember');
		if (Auth::attempt(array("email"=>$email, "password"=>$pwd), 
			$remember))
			return Redirect::route("admin_home");

		return Redirect::route('admin_login')
			->with('message', 'Invalid username or password.');
	}

	public function home()
	{	$data = array();

		$menu = MenuModel::all();
		if (count($menu) > 0)
			$data['menu'] = Utils::fetch_assoc($menu, 'title');

		//echo "<pre>"; echo print_r($data['menu']); die;

		return View::make("admin.home", $data);
	}

	public function section($title)
	{	$data = array();

		$sections = SectionsModel::where("title", "=", $title)->get();
		if (count($sections) > 0)
		{	$data['sections'] = array(
				$sections[0]['title'] =>$sections[0]);

			$contents = ContentsModel::where("section", "=", 
				$sections[0]['id'])->get();
			if (count($contents) > 0)
				$data['contents'] = array(
					$sections[0]['title'] => $contents);
		}

		$template = "admin.section_".$sections[0]['title'];

		return View::make($template, $data);
	}

	public function content_delete()
	{	$id = Input::get('delete_id');

		ContentsModel::destroy($id);

		return Redirect::back();
	}

	public function content_add()
	{	$validation = ContentsModel::validate(Input::all());

		if ($validation->fails())
			return Redirect::back();

		$file_path = "";

		if (Input::has('icon'))
			$file_path = Input::get('icon');
		else if(Input::hasFile('image'))
		{	$file = Input::file('image');
			$destinationPath = public_path()
				.'/assets/fileupload/images';
			$filename = str_random(6) . '_' . 
				$file->getClientOriginalName();

			if ($file->move($destinationPath, $filename))
				$file_path = 'fileupload/images/'.$filename;
		}

		if (!$file_path)
			return Redirect::back();

		$fb_link = Input::get('fb_link', '');
		$ln_link = Input::get('fb_link', '');
		$tw_link = Input::get('fb_link', '');
		$links_id = -1;
		if ($fb_link || $ln_link || $tw_link)
		{	$links = new SocialLinksModel;
			$links->twitter_url = $tw_link;
			$links->facebook_url = $fb_link;
			$links->linkedin_url = $ln_link;

			$links->save();
			$links_id = $links->id;
		}

		$content = new ContentsModel;
		$content->image = $file_path;
		$content->title = Input::get('title');
		$content->description = Input::get('description');
		$content->section = Input::get('section_id');
		$content->duration = Input::get('duration', '');
		$content->url = Input::get('url', '');
		if ($links_id != -1)
			$content->links = $links_id;

		$content->save();

		return Redirect::back();
		
	}
}

?>
