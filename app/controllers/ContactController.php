<?php

class ContactController extends BaseController
{	public function view()
	{	$data = array();

		$menu = MenuModel::orderBy('display_order')->get();
		if (count($menu) > 0)
			$data['menu'] = Utils::fetch_assoc($menu, 'title');

		$user_menu = MenuModel::where("user_created", "=", true)
			->orderBy("display_order")->get();
		if (count($user_menu) > 0)
			$data['user_menu'] = Utils::fetch_assoc($user_menu, 'title');

		$contacts = ContactModel::all();
		if (count($contacts) > 0)
			$data['contacts'] = $contacts;

		return View::make('admin.contact', $data);
	}

	
	//Send Email For Contact Us
	public function add()
	{	$data = array();
		
		$validation = ContactModel::validate(Input::all());
		if ($validation->fails())
			return Redirect::to(URL::to('/'));
			
		$to 	   = 'smartsbee14@gmail.com';
		$name      = Input::get("name"); 
        $email     = Input::get("email");
        $phone     = Input::get("phone");
        $messages  = Input::get("message");
        
        $message = "
		<html>
		<body>
			<p>This Email Contains User Info</p>
			<table>
				<tr>
					<th>Name : </th>
					<td>".$name."</td>
				</tr>
				<tr>
					<th>Email : </th>
					<td>".$email."</td>
				</tr>
				<tr>
					<th>Phone : </th>
					<td>".$phone."</td>
				</tr>
				<tr>
					<th>Messages : </th>
					<td>".$messages."</td>
				</tr>
			</table>
		</body>
		</html>
		";
        
		$header = "MIME-Version: 1.0\r\n"; 
		$header.= "Content-Type: text/html; charset=utf-8\r\n"; 
		$header.= "X-Priority: 1\r\n";
		
		$getUser=User::first();
		
		if($getUser){
			mail($getUser->email, $name,$message, $header);
			}
        
        //Data save into database table
        $contact = new ContactModel;
		$contact->name = Input::get("name");
		$contact->email = Input::get("email");
		$contact->phone = Input::get("phone");
		$contact->message = Input::get("message");
		$contact->save();
		return Redirect::to(URL::to('/'));
	}
	
	public function get()
	{	$choice = Input::get('var');

		$contact = MenuModel::where('title', '=', "contact")->get();
		$contact = $contact[0];
		
		$data = "";

		if ($choice == "title")
			$data = $contact->display_name;
		else if ($choice == "description")
			$data = $contact->description;

		return Response::json('{"res":"'.$data.'"}');
	}

	public function put()
	{	$rules = array(
			"title"=>"min:2",
			"description"=>"min:2"
		);

		$validation = Validator::make(Input::all(), $rules);
		if ($validation->fails())
			return Redirect::to(URL::to('/admin/contact'));

		$contact = MenuModel::where('title', '=', "contact")->get();
		$contact = $contact[0];

		if (Input::has('title'))
			$contact->display_name = Input::get('title');
		if (Input::has('description'))
			$contact->description = Input::get('description');

		$contact->save();

		return Redirect::to(URL::to('/admin/contact'));
	}
}

?>
