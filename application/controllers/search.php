<?php

class Search_Controller extends Base_Controller {

    const model_name = 'models.search';
    const table_view = 'forms.tableset';
    const form_view  = 'forms.fieldset';
    
    public $restful = true;
    private $offer, $offer_name;
    
    public function __construct() {
        $this->offer_name = URI::segment(2);
        $this->offer = Config::get('search.'.$this->offer_name);
//        Log::info(print_r($this->offer, true));
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
            'title'  => 'Search '.$this->offer_name,
            'labels' => 'search',
        ));
    }
    
    public function get_make2() {
        $fields = RKFieldSet::from_model(self::model_name);
        $fields->get('offer_type')
               ->value($this->offer_type());
        $fieldsets = array(
            $fields->only(array(
                'offer_type', 'from_country', 'from_district', 'legend01', 
                'auto_type', 'auto_capacity_from', 'auto_capacity_to')),
            $fields->only(array(
                'to_country', 'to_district', 'legend02', 
                'load_date', 'auto_volume_from', 'auto_volume_to')),
        );
        $view = View::make('forms.fieldset2col', array(
            'action'    => URI::current(),
            'title'     => 'Search '.$this->offer_name, 
            'labels'    => 'search',
            'fieldsets' => $fieldsets
        ));
        return $view;
    }

    public function post_make() {
        $fields = RKFieldSet::from_model(self::model_name);
        $inputs = $fields->inputs();
        $rules = $fields->rules();
        $validator = Validator::make($inputs, $rules);
        if ($validator->fails()) {
            echo 'Search Validator Failed';
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
