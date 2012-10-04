<?php

class Ref_Controller extends Base_Controller {
	public $restful = true;

	private function find_by_name($ref_type, $ref_name) {
		$data = array();
		if (!empty($ref_name)) {
			$data = RKUtils::model_to_array(
				Ref::where_ref_type($ref_type)
					->where('ref_name', 'like', $ref_name.'%')->get(array('ref_name')),
				'ref_name'
			);
		}
		return $data;
	}

	public function get_country() {
		$ref_name = Input::get('q');
		$data = $this->find_by_name(4, $ref_name);
		return Response::json($data);
	}

	public function get_district() {
		$ref_name = Input::get('q');
		$data = $this->find_by_name(5, $ref_name);
		return Response::json($data);
	}

	public function get_town() {
		$ref_name = Input::get('q');
		$data = $this->find_by_name(6, $ref_name);
		return Response::json($data);
	}

	public function get_test() {
		return View::make('forms.ref_test')
				->with('login_errors', false);
	}

	public function post_test() {
		if (Auth::guest()) {
			Cookie::put('sapoc_new_offer', json_encode(Input::get()), 30, '/', URL::base());
			Log::info('Cookied');
		}
		// $creds = array(
		//     'username' => Input::get('email'),
		//     'password' => Input::get('password')
		// );
		// if (Auth::attempt($creds)) {
		// 	echo 'Data saved';
		// } else {
		// 	return Redirect::to('ref/test')
		// 			->with_input()
		// 			->with('login_errors', true);
		// }
	}

}