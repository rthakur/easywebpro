<?php

class InstallationController extends BaseController
{	public function db()
	{	if (Utils::checkDBConnection())
			return Redirect::to(URL::to('installation/user'));

		return View::make('installation.db');
	}

	public function user()
	{	if (Utils::checkUserTable())
			return Redirect::to('/');

		return View::make('installation.user');
	}

	public function configure_db()
	{	$rules = array(
			"db_name"=>"required|min:2",
			"db_user"=>"required|min:2",
		);

		$validation = Validator::make(Input::all(), $rules);

		if ($validation->fails())
			return Redirect::to(URL::to('/installation/db'))
				->with("errors", $validation->messages()->all());

		$db_name = Input::get("db_name");
		$db_user = input::get("db_user");
		$db_password = input::get("db_password");
		$db_host = input::get("db_host");

		$db_config = file_get_contents(__DIR__.
			'/../config/database.sample.php');
		$db_config = str_replace('{localhost}', $db_host, $db_config); 
		$db_config = str_replace('{database}', $db_name, $db_config); 
		$db_config = str_replace('{username}', $db_user, $db_config); 
		$db_config = str_replace('{password}', $db_password,
			$db_config);

		file_put_contents(__DIR__.'/../config/database.php',
			$db_config);

		try
		{	Artisan::call('migrate', 
				array('--force' => true, '--seed'=>true));
		}
		catch(Exception $e)
		{	Artisan::call('migrate');
		}	

		if (!Utils::checkUserTable())
			return Redirect::to(URL::to("/installation/user"));

		return Redirect::to(URL::to('/admin/'));
	}

	public function configure_user()
	{	
		$rules = array(
			"email" => "required|email|unique:users",
			"password" => "required|min:6|confirmed",
			"password_confirmation" => "required|min:6",
		);

		$validation = Validator::make(Input::all(), $rules);

		if ($validation->fails())
			return Redirect::to(URL::to('/installation/user'))
				->with('errors', $validation->messages()->all());

		$user = new User;
		$user->email = Input::get("email");
		$user->password = Hash::make(Input::get("password"));
		$user->save();

		return Redirect::to(URL::to('/admin/'));
	}

	public function check_perms()
	{	$errors = Utils::checkFileSystemPermissions();

		if (count($errors) > 0)
			return View::make("installation.perms")->with("errors", $errors);
		else
			return Redirect::to(URL::to("/installation/db"));
	}
}

?>
