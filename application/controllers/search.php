<?php

class Search_Controller extends Base_Controller {

    const model_name = 'models.search';
    const table_view = 'forms.tableset';
    const form_view  = 'forms.fieldset';
    
    public $restful = true;
    private $offer;
    
    public function __construct() {
        $this->offer = Config::get('search.'.URI::segment(2));
        Log::info(print_r($this->offer, true));
        parent::__construct();
    }
    
    private function offer_type() {
        return $this->offer['offer_type'];
    }
    
    private function search_columns() {
        return json_decode($this->offer['search_columns']);
    }
    
    private function view_columns() {
        return json_decode($this->offer['view_columns']);
    }
    
    public function get_make() {
        $fields = RKFieldSet::from_model(self::model_name);
        $fields->get('offer_type')
            ->value($this->offer_type());
        return View::make(self::form_view, array(
            'fields' => $fields->get(),
            'action' => URI::current(),
            'title'  => 'Search',
            'labels' => 'search',
        ));
    }
    
    public function post_make() {
        $fields = RKFieldSet::from_model(self::model_name);
        $inputs = $fields->inputs();
        $rules = $fields->rules();
        $validator = Validator::make($inputs, $rules);
        if ($validator->fails()) {
            echo 'Fail View';
        } else {
            $inputs = array_filter($inputs); // only non empty
            $search_result = Offer::search($inputs, $this->search_columns());
            return View::make(self::table_view, array(
                'heads'  => $this->view_columns(),
                'rows'   => $search_result,
                'title'  => 'Search result',
                'labels' => 'search'
            ));
        }
    }
 
}
