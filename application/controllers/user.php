<?php

class User_Controller extends Base_Controller {
	
    const table_view = 'forms.tableset';
    
    public $restful = true;
    private $config = null;

    public function __construct() {
        $this->config = Config::get('search.all_by_user');
        parent::__construct();
    }
    
    private function search_columns() {
        return json_decode($this->config['search_columns']);
    }
    
    private function view_columns() {
        return json_decode($this->config['view_columns']);
    }
    
	public function get_bids() {
        $search_result = Offer::all_by_user(Auth::user()->id, $this->search_columns());
        return View::make(self::table_view, array(
            'heads'  => $this->view_columns(),
            'rows'   => $search_result,
            'title'  => __('search.user_bids_title'),
            'labels' => 'search',
            'btns'   => array(
                'offers/edit' => 'icon-edit',
                'offers/remove' => 'icon-remove',    
            ),
        ));
	}	
}