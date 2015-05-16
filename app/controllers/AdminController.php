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
		$menu = MenuModel::where("user_created", "=", false)
			->orderBy('display_order')->get();
		if (count($menu) > 0)
			$data['menu'] = Utils::fetch_assoc($menu, 'title');

		$menu = MenuModel::orderBy("display_order")->get();
		if (count($menu) > 0)
			$data['menu'] = Utils::fetch_assoc($menu, 'title');

		$home = HomePageModel::all();
		if (count($home) > 0)
		{	$home = $home[0];
			$data['home'] = $home;
		}
		
		$skins = SkinsModel::all();
		if (count($skins) > 0)
			$data['skins'] = $skins;

		$cur_skin = SkinsModel::where("id", "=", $home->skin)->get();
		if (count($cur_skin) > 0)
		{	$cur_skin = $cur_skin[0];
			$data['cur_skin'] = $cur_skin;
		}

		$html_pages = HtmlPagesModel::where("url", "=", "terms")
						->orWhere("url", "=", "policy")->get();

		if (count($html_pages) > 0)
			$data['html_pages'] = Utils::fetch_assoc($html_pages, 'url');

		return View::make("admin.home", $data);
	}

	public function get()
	{	$choice = Input::get('var');

		$home = HomePageModel::all();
		$home = $home[0];
		
		$data = "";

		if ($choice == "heading")
			$data = $home->heading;
		else if ($choice == "sub_heading")
			$data = $home->sub_heading;
		else if($choice == "title")
			$data = $home->title;
		else if( $choice == "social")
		{	$data = '{"tw":"'.$home['twitter_link'].'", "ln":"'.
				$home['linkedin_link'].'", "fb":"'.
				$home['facebook_link'].'"}';

			return Response::json('{"res":'.$data.'}');
		}

		return Response::json('{"res":"'.$data.'"}');
	}

	public function put()
	{	

		$home = HomePageModel::all();
		$home = $home[0];

		if (array_key_exists('heading',Input::all()))
			$home->heading = Input::get('heading');
		if (array_key_exists('sub_heading',Input::all()))
			$home->sub_heading = Input::get('sub_heading');
		if (array_key_exists('title',Input::all()))
			$home->title = Input::get('title');
		if (array_key_exists('facebook',Input::all()))
			$home->facebook_link = Input::get('facebook');
		if (array_key_exists('twitter',Input::all()))
			$home->twitter_link = Input::get('twitter');
		if (array_key_exists('linkedin',Input::all()))
			$home->linkedin_link = Input::get('linkedin');
		if (array_key_exists('title_image',Input::all()))
			$home->title_image = Utils::image_fetch_save('title_image', 100, 
				50);
		if (array_key_exists('heading_color',Input::all()))
			$home->heading_color = Input::get("heading_color");
		if (array_key_exists('sub_heading_color',Input::all()))
			$home->sub_heading_color = Input::get("sub_heading_color");
		if (array_key_exists('heading_size',Input::all()))
			$home->heading_size = Input::get("heading_size");
		if (array_key_exists('sub_heading_size',Input::all()))
			$home->sub_heading_size = Input::get("sub_heading_size");
		$home->save();

		return Redirect::to(URL::to('/admin'));
	}

	public function bg_update()
	{	$home = HomePageModel::all();
		$home = $home[0];

		if (Input::file('new_image'))
			$home->image = Utils::image_fetch_save('new_image', 1900,
				1250);		
		if (Input::has('header_image_height'))
			$home->header_image_height = Input::get("header_image_height");

		$home->save();

		return Redirect::to(URL::to('/admin/'));
	}

	public function htmlPageVisibility()
	{	$visible = Input::get('visible');
		$visible = ($visible == "true" ? false : true);

		$url = Input::get('url');

		$html_page = HtmlPagesModel::where('url', '=', $url)->get();
		if (count($html_page) > 0)
		{	$html_page = $html_page[0];
			$html_page->active = $visible;
			$html_page->save();

			return "success";
		}
		else
			return "failure";
	}

	public function section_activate()
	{	$menu_entry = array("services", "portfolio", "about", "team", "contact");

		$ids_active = array();
		
		foreach ($menu_entry as $entry)
		{	if (Input::has($entry))
			{	$val = Input::get($entry);
				echo $val;die;
				array_push($ids, Input::get($entry));
			}
		}

		DB::table('menu')->whereIn('id', $ids)->update('active');

		return Redirect::to(URL::to('/admin'));
	}
	
	/* Delete Section From Menu */
	public function deletesection()
	{	
		$getSection=SectionModel::where('menu_id',Input::get('id'));
		if($getSection)
			$getSection->delete();
		
		$MenuModel = MenuModel::find(Input::get('id'));
		if($MenuModel)
			$MenuModel->delete();
			return 'success';
	}

	public function get_terms()
	{	$data = array();

		$menu = MenuModel::all();
		if (count($menu) > 0)
			$data['menu'] = Utils::fetch_assoc($menu, 'title');

		$terms = HtmlPagesModel::where('url', '=', 'terms')->get();
		if (count($terms) > 0)
		{	$data['html'] = $terms[0]->html;
			$data['id'] = $terms[0]->id;
		}

		$data['save_url'] = 'terms';

		return View::make("admin.flat_page", $data);
	}

	public function get_policy()
	{	$data = array();

		$menu = MenuModel::all();
		if (count($menu) > 0)
			$data['menu'] = Utils::fetch_assoc($menu, 'title');

		$policy = HtmlPagesModel::where('url', '=', 'policy')->get();
		if (count($policy) > 0)
		{	$data['html'] = $policy[0]->html;
			$data['id'] = $policy[0]->id;
		}

		$data['save_url'] = 'policy';

		return View::make("admin.flat_page", $data);
	}

	public function saveHtmlPage()
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

		return Redirect::to(URL::to('/admin'));
	}

	public function skin_set()
	{	$skin_id = Input::get('skin_id');

		$home = HomePageModel::all();
		$home = $home[0];

		$home->skin = $skin_id;
		$home->save();
			return "success";
	}

	public function sections_enable()
	{	$id = Input::get('id');

		$section = MenuModel::where("id", "=", $id)->get();
		if (count($section) > 0)
		{	$section = $section[0];

			$active = Input::get('active');
			if ($active == "true")
				$section->active = true;
			else
				$section->active = false;

			if ($section->save())
				return "success";
			else
				return "failure";
		}
		else
			return "failure";
	}

	public function titleImage()
	{	$active = Input::get("active");

		$home_page = HomePageModel::all();
		if (count($home_page) > 0)
		{	$home_page = $home_page[0];

			if ($active == "true")
				$home_page->tile_image_active = true;
			else
				$home_page->tile_image_active = false;

			$home_page->save();
			return "success";
		}
		else
			return "false";
	}

	public function addSection()
	{	$rules = array(
			"section" => "required|min:3|max:20"
		);

		$validation = Validator::make(Input::all(), $rules);
		if ($validation->fails()){
			$notification[]=array(
								'message'  =>$validation->messages()->first('section'),
								'type'   =>'error',
								'timeout'  =>'20'); 
					Session::flash('notification',$notification);	
			return Redirect::to(URL::to('/admin'));
				//->withErrors($validation);
			}

		$display_at = intval(DB::table('menu')->max('display_order')) 
			+ 1;

		$menu = new MenuModel;
		$menu->display_order = strval($display_at);
		$menu->display_name = Input::get('section');
		$menu->title = Input::get('section');
		//$menu->display_name = Input::get('section');
		$menu->description = "";
		$menu->link = Input::get('section');
		$menu->user_created = true;
		$menu->save();
		return Redirect::back();
	}

	public function saveSection()
	{	$id = Input::get('id');
		$html = Input::get('html');
		$menu_id = Input::get('menu_id');

		$section = SectionModel::where('menu_id', '=', $menu_id)->get();
		if (count($section) > 0)
		{	$section = $section[0];
			$section->html = $html;
		}
		else
		{	$section = new SectionModel;
			$section->html = $html;
			$section->menu_id = $menu_id;
		}

		$section->save();

		return Redirect::back();
	}

	public function viewSection($id)
	{	$id = intVal($id);
		$data = array();

		$section = SectionModel::join('menu', 'menu.id', '=', 'menu_id')
			->where("menu_id", '=', $id)->get();
		if (count($section) > 0)
		{	$data['section'] = $section[0];
		}

		$menu = MenuModel::orderBy('display_order')->get();
		if (count($menu) > 0)
			$data['menu'] = Utils::fetch_assoc($menu, 'title');

		$user_menu = MenuModel::where("user_created", "=", true)
			->orderBy("display_order")->get();
		if (count($user_menu) > 0)
			$data['user_menu'] = Utils::fetch_assoc($user_menu, 'title');

		$data['menu_id'] = $id;

		return View::make('admin.admin_section', $data);
	}
	
	/* update meta tag and return home*/
	public function updateMetaTags(){
		$InputAll = array_map('trim', Input::all());
		/*echo '<pre>';
		print_r($InputAll);
		die;*/
		foreach($InputAll as $key=>$value){
			$meta = Option::where('name', $key)->first();
			if($meta){
				$meta->value = $value;
				$meta->save();
			}
		}
		Session::flash('metasave', 'Meta data saved successfully');
		return Redirect::back();
	}

}

?>
