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
            $search_result = Offer::search($inputs);
//            var_dump($search_result);
            return View::make('forms.tableset', array(
                'heads'  => $search_result['heads'],
                'rows'   => $search_result['rows'],
                'title'  => 'Search result',
                'labels' => 'search'
            ));
        }
    }
 
}