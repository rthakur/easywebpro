<?php

class PortfolioController extends BaseController
{	public function view()
	{	$data = array();

		$menu = MenuModel::all();
		if (count($menu) > 0)
			$data['menu'] = Utils::fetch_assoc($menu, "title");

		$portfolio = PortfolioModel::all();
		if (count($portfolio) > 0)
			$data['portfolio'] = $portfolio;

		return View::make('admin.portfolio', $data);
	}

	public function delete()
	{	$id = Input::get("delete_id");

		PortfolioModel::destroy($id);

		return Redirect::back();
	}

	public function add()
	{	$validation = PortfolioModel::validate(Input::all());

		if ($validation->fails())
			return Redirect::to('/admin/portfolio')
				->withErrors($validation);

		$portfolio = new PortfolioModel;
		$portfolio->image = Utils::image_fetch_save('image');
		$portfolio->title = Input::get('title');
		$portfolio->category = Input::get('category');
		$portfolio->save();

		return Redirect::to('/admin/portfolio');
	}

	public function update()
	{	$rules = array(
			"id" => "required",
			"title" => "required|min:2",
			"category" => "required|min:2"
		);

		$validation = Validator::make(Input::all(), $rules);

		if ($validation->fails())
			return Redirect::to('/admin/portfolio')
				->withErrors($validation);

		$portfolio = PortfolioModel::find(Input::get('id'));
		$portfolio->title = Input::get('title');
		$portfolio->category = Input::get('category');
		if (Input::hasFile('image'))
			$portfolio->image = Utils::image_fetch_save('image');

		$portfolio->save();

		return Redirect::to('/admin/portfolio');
	}
}

?>
