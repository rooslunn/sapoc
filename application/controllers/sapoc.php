<?php

class Sapoc_Controller extends Base_Controller {

	public function action_index()
	{
		return View::make('sapoc.index');
	}

}