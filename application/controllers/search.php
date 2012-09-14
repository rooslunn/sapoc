<?php

class Search_Controller extends Base_Controller {

    public $restful = true;
    
    public function get_freight() {
        $fields = RKFieldSet::from_model('models.search');
//        var_dump($fields);
        return View::make('forms.fieldset', array(
            'fields' => $fields->get(),
            'action' => 'search/freight',
            'title'  => 'Search',
            'labels' => 'search',
        ));
    }
    
    public function post_freight() {
        $fields = RKFieldSet::from_model('models.search');
        $inputs = $fields->inputs();
        $rules = $fields->rules();
        $validator = Validator::make($inputs, $rules);
        if ($validator->fails()) {
            echo 'Fail View';
        } else {
            $inputs = array_filter($inputs); // only non empty
            $columns_for_search = array(
                'auto_type', 'from_date', 'to_date', 'from_country', 'to_country',
                'from_town', 'to_town', 'comments', 'auto_price'
            );
            $search_result = Offer::search($inputs, $columns_for_search);
            
            $columns_for_view = array(
                'auto_type_name', 'load_period', 'route', 'freight', 'price', 'contacts'
            );
            return View::make('forms.tableset', array(
                'heads'  => $columns_for_view,
                'rows'   => $search_result,
                'title'  => 'Search result',
                'labels' => 'search'
            ));
        }
    }
 
}