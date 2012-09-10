<?php

class Offers_Controller extends Base_Controller {
    
    private function get_legend($offer_type) {
        return ($offer_type == 1) ? __('offers-new.legend_freight') : __('offers-new.legend_trans');
    }
    
    private function new_offer($offer_type) {
        $fields = array(
            'from_date' => array(
                'class' => 'date-picker'
            ),
            'to_date' => array(
                'class' => 'date-picker'
            ),
            '-',
            'from_country' => array(
                'data-provide' => 'typeahead', 
                'data-source' => '["Ukraine","Russia","Moldova"]'
                ),
            'from_state',
            'from_town',
            '-',  
            'to_country'   => array(
                'data-provide' => 'typeahead', 
                'data-source' => '["Ukraine","Russia","Moldova"]'
                ),
            'to_state',  
            'to_town',
            '-',    
            'auto_type',
            'auto_load_type',
            'auto_capacity',
            'auto_volume',
            'auto_price', 
            'auto_count',  
            'auto_license',  
            'comments',
        );
        return View::make('offers.new')
                ->with('offer_type', $offer_type)
                ->with('legend', $this->get_legend($offer_type))
                ->with('fields', $fields);
    }
    
    public function action_new_freight() {
        return $this->new_offer(1);
    }
    
    public function action_new_trans() {
        return $this->new_offer(2);
    }
    
    public function action_new_post() {
        $input = array(
            'user_id'          => Input::get('user_id'),
            'offer_type'       => Input::get('offer_type'),
            
            'from_date'        => Input::get('from_date'),
            'to_date'          => Input::get('to_date'),
            
            'from_country'     => Input::get('from_country'),
            'from_state'       => Input::get('from_state'),
            'from_town'        => Input::get('from_town'),
            
            'to_country'       => Input::get('to_country'),
            'to_state'         => Input::get('to_state'),
            'to_town'          => Input::get('to_town'),
            
            'auto_type'        => Input::get('auto_type'),
            'auto_load_type'   => Input::get('auto_load_type'),
            'auto_capacity'    => Input::get('auto_capacity'),
            'auto_volume'      => Input::get('auto_volume'),
            'auto_price'       => Input::get('auto_price'),
            'auto_count'       => Input::get('auto_count'),
            'auto_license'     => Input::get('auto_license'),
            'comments'         => Input::get('comments'),
        );
        
        $rules = array(
            'offer_type'   => 'required',
            'from_date'    => 'required',
            'to_date'      => 'required',
            
            'from_country' => 'required',
            'from_town'    => 'required',
            
            'to_country'   => 'required',
            'to_town'      => 'required',
            
            'auto_type'    => 'required',
            'auto_capacity'=> 'numeric|required',
            'auto_count'   => 'integer',
            'auto_price'   => 'numeric',
        );
        
        $v = Validator::make($input, $rules);
        if ($v->fails()) {
            return Redirect::to('offers/new')
                    ->with_errors($v)
                    ->with_input();
        } else {
            $offer = new Offer($input);
            $offer->save();
            return View::make('sapoc.pages.result')
                    ->with('message', __('offers-new.save-success'));
        }
    }
}