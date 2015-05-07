<?php

class ContactController extends BaseController
{	public function view()
	{	$data = array();

		$menu = MenuModel::all();
		if (count($menu) > 0)
			$data['menu'] = Utils::fetch_assoc($menu, "title");

		return View::make('admin.contact', $data);
	}
}

?>
