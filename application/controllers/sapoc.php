<?php

class Sapoc_Controller extends Base_Controller {

	public function action_index()
	{
		return View::make('sapoc.pages.index');
	}

	public function action_login()
	{
		return View::make('sapoc.pages.login');
	}
	
	public function action_auth()
	{
    	$email = Input::get('email');
    	$pswd = Input::get('password');
    	
    	$creds = array(
    	   'username'  => $email,
    	   'password'  => $pswd
    	);
    	
    	try {
        	if (Auth::attempt($creds)) {
            	return View::make('sapoc.pages.index-full');
        	} else {
        	   return Redirect::to('login')
        	       ->with('login_errors', true);
        	}
        } catch (\Exception $e) {
            // TODO: Show Error page
        }
	}
	
	public function action_register() {
    	return View::make('sapoc.pages.register');
	}
	
	public function action_create_user() {
    	$user_data = array(
    	   'email'         => Input::get('email'),
    	   'password'      => Input::get('password'),
    	   'company'       => Input::get('company'),
    	   'company_id'    => Input::get('company_id'),
    	   'country_id'    => Input::get('country_id'),
    	   'district_id'   => Input::get('district_id'),
    	   'city'          => Input::get('city'),
    	   'address'       => Input::get('address'),
    	   'phone_1'       => Input::get('phone_1'),
    	   'contact_person'=> Input::get('contact_person'),
    	);
    	
    	$rules = array(
    	   'email'     => 'email|unique:users|required|min:6',
    	   'password'  => 'required|min:6',
    	);
    	$v = Validator::make($user_data, $rules);
    	
    	if ($v->fails()) {
        	return Redirect::to('register')
        	           ->with_errors($v)
        	           ->with_input();
    	} else {
        	$user_data['password'] = Hash::make($user_data['password']);
        	$user = new User($user_data);
        	$user->save();
        	
        	$this->send_activation_message($user_data['email']);
        	return View::make('sapoc.pages.activation');
    	}
	}
	
	private function send_activation_message($email) {
    	$acode = Hash::make($email); // TODO: make more sec, add salt
    	$message = View::make('sapoc.mail.activation')
    	               ->with('acode', $acode);
    
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";	
        
        $subject = 'Activation code';
        
        return mail($email, $subject, $message, $headers);
}
	
}