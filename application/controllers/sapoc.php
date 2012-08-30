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
    	   'email'     => 'email|unique:users|required',
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
        	return View::make('sapoc.pages.index-full');
    	}
	}
	
    public function action_verify() {
        return View::make('sapoc.pages.verify');
    }
    
    public function action_send_verification() {
        $input = array(
            'email' => Input::get('email'),
        );
        $rules = array(
            'email' => 'email|unique:users|required',
        );
        $v = Validator::make($input, $rules);
        if ($v->fails()) {
            return Redirect::to('verify')
                    ->with_errors($v)
                    ->with_input();
        }
        
        $res = $this->send_verification_message($input['email']);
        if ($res) {
            Log::info("Verification successfully sent to {$input['email']}");
        }
        
        return View::make('sapoc.pages.verification');
    }

    private function get_verification_link($email) {
        $salt = Config::get('application.email_salt');
    	$vcode = Hash::make($email . $salt);
        $link = sprintf("%s/%s/%s",
            HTML::link_to_action('sapoc@register'),
            htmlentities($email),
            $vcode
        );
        return $link;
    }
    
	private function send_verification_message($email) {
	    $link = $this->get_verification_link($email);
    	$message = View::make('sapoc.mail.verification')
                        ->with('link', $link);
    
        $headers = 'From: sapoc.mail@yandex.ru' . "\r\n";
        $headers .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";	
        
        $subject = __('form-verify.email-subject');
        
        return mail($email, $subject, $message, $headers);
    }
    
	
}