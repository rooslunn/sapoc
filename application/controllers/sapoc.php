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
                if ($redir = Cookie::get('rid')) {
                    Cookie::forget('rid');
                    return Redirect::to($redir)->with_input();
                }
            	return View::make('sapoc.pages.index');
        	} else {
        	   return Redirect::to('login')
        	       ->with('login_errors', true);
        	}
        } catch (\Exception $e) {
            // TODO: Show Error page
        }
	}
	
	public function action_register() {
        Log::info(print_r(Input::all(), true));
	    $input = array(
    	    'email' => Input::get('email'),
    	    'code' => Input::get('code'),
    	);
    	$rules = array(
    	    'email' => 'email|required',
    	    'code'  => 'required'
    	);
    	$v = Validator::make($input, $rules);
    	if ($v->fails() || !$this->is_code_correct($input)) {
            return View::make('sapoc.pages.verification')
                        ->with('message', __('form-verify.fail'))
                        ->with('link', URL::base());
    	}
    	return View::make('sapoc.pages.register');
	}
	
	private function is_code_correct(array $input)	{
	    $correct_code = $this->get_verification_code($input['email']);
	    return $correct_code === $input['code'];
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
    	   'code'          => Input::get('code')
    	);
    	
    	$rules = array(
    	   'email'       => 'email|unique:users|required',
    	   'password'    => 'required|min:6',
           'company'     => 'required',
           'country_id'  => 'required',
           'district_id' => 'required',
           'city'        => 'required',
           'address'     => 'required',
           'phone_1'     => 'required',
    	);
    	$v = Validator::make($user_data, $rules);
    	
    	if (!$this->is_code_correct($user_data)) {
    	    Log::cheater(Request::ip());
            return View::make('sapoc.pages.verification')
                        ->with('message', __('form-verify.cheater'))
                        ->with('link', __('form-verify.cheater-url'));
    	}
    	
    	if ($v->fails()) {
        	return Redirect::to($this->get_verification_link($user_data['email']))
                       ->with('register_errors', true) 
        	           ->with_errors($v)
        	           ->with_input();
    	} else {
        	$user_data['password'] = Hash::make($user_data['password']);
        	$user = new User($user_data);
        	$user->save();
        	return $this->action_login();
//        	return View::make('sapoc.pages.index-full')
//        	        ->with('user', $user_data['email']);
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
        
	    $link = $this->get_verification_link($input['email']);
        $res = $this->send_verification_message($input['email'], $link);
        if ($res) {
            Log::info("Verification successfully sent to {$input['email']}");
        }
        return View::make('sapoc.pages.verification')
                    ->with('message', __('form-verify.success'))
                    ->with('link', $link);
    }

    private function get_verification_code($email) {
        $salt = Config::get('application.hash_salt');
        $algo = Config::get('application.hash_algo');
        return hash($algo, ($email . $salt));
    }
    
    private function get_verification_link($email) {
        $vcode = $this->get_verification_code($email);
        $link = sprintf("%s?email=%s&code=%s",
            url('register'),
            urlencode($email),
            $vcode
        );
        return $link;
    }
    
	private function send_verification_message($email, $link) {
    	$message = View::make('sapoc.mail.verification')
                        ->with('link', $link)
                        ->with('linkname', __('form-verify.linkname'));
//        echo $message; // TODO: delete    
        $headers = 'From: sapoc.mail@yandex.ru' . "\r\n";
        $headers .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";	
        
        $subject = __('form-verify.email-subject');
        
        return mail($email, $subject, $message, $headers);
    }
    
	
}