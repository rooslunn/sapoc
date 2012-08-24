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
	
}