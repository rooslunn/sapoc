<?php

class Base_Controller extends Controller {

	public function __construct()
	{
	    //js
	    Asset::add('jquery', 'js/jquery-1.7.2.min.js');
	    Asset::add('bootstrap-js', 'js/bootstrap.min.js', 'jquery');
	    Asset::add('bootstrap-js-datepicker', 'js/bootstrap-datepicker.js', 'bootstrap-js');
	    Asset::add('moment-js', 'js/moment.min.js');
	    Asset::add('sapoc-js', 'js/sapoc.js', 'jquery');
	    
	    //css
	    Asset::add('bootstrap-css', 'css/bootstrap.min.css');
	    Asset::add('bootstrap-css-responsive', 'css/bootstrap-responsive.min.css', 'bootstrap-css');
	    Asset::add('datepicker-css', 'css/datepicker.css', 'bootstrap-css');
	    Asset::add('sapoc-css', 'css/sapoc.css', 'bootstrap-css');
	    
	    //Form macros
	    Form::macro('date', function($name) {
	        return sprintf(
	            '<input type="text" name="%s" id="%s" class="%s">',
	            $name, Config::get('application.date_class_js')
	        );
	    });
	    
	    parent::__construct();
	}

	/**
	 * Catch-all method for requests that can't be matched.
	 *
	 * @param  string    $method
	 * @param  array     $parameters
	 * @return Response
	 */
	public function __call($method, $parameters)
	{
		return Response::error('404');
	}

}