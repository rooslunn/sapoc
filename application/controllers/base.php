<?php

class Base_Controller extends Controller {

	public function __construct()
	{
	    //Assets
	    Asset::add('sapoc-js', 'js/sapoc.js');
	    Asset::add('jquery', 'js/jquery-1.7.2.min.js');
	    Asset::add('bootstrap-js', 'js/bootstrap.min.js', 'jquery');
	    Asset::add('bootstrap-css', 'css/bootstrap.min.css');
	    Asset::add('bootstrap-css-responsive', 'css/bootstrap-responsive.min.css', 'bootstrap-css');
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