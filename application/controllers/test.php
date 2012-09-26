<?php 

class Test_Controller extends Base_Controller {
	public $restful = true;

	public function get_test() {
		return View::make('forms.test');
	}
}