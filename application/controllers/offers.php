<?php

class Offers_Controller extends Base_Controller {
    
    private function get_legend($offer_type) {
        return ($offer_type == 1) ? __('offers-new.legend_freight') : __('offers-new.legend_trans');
    }
    
    private function datepicker_field() {
        return array('class' => 'date-picker');    
    }
    
    private function country_field() {
        return array(
            'data-provide' => 'typeahead', 
            'data-source' => '["Ukraine","Russia","Moldova"]'
        );
    }
    
    private function select_field($data_source_name) {
        $cfg = Config::get($data_source_name);
        $ref_type = $cfg['ref_type'];
        $values = DB::table('refs')
                    ->where_ref_type($ref_type)
                    ->get(array('ref_id', 'ref_name'));
        $ds = array();
        foreach($values as $rec) {
            $ds[$rec->ref_id] = $rec->ref_name;
        }
        return array(
            'data-select' => '1',
            'data-source' => $ds
        );    
    }
    
    private function new_offer($offer_type) {
        $fields = array(
            'from_date'    => $this->datepicker_field(),
            'to_date'      => $this->datepicker_field(),
            '-',
            'from_country' => $this->country_field(),
            'from_state',
            'from_town',
            '-',  
            'to_country'   => $this->country_field(),
            'to_state',  
            'to_town',
            '-',   
            'auto_type'        => $this->select_field('refs.auto_type'),
            'auto_load_type'   => $this->select_field('refs.auto_load_type'),
            'auto_capacity',
            'auto_volume',
            'auto_price', 
            'auto_pay_type'    => $this->select_field('refs.auto_pay_type'),
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
        return $this->new_offer($offer_type=1);
    }
    
    public function action_new_trans() {
        return $this->new_offer($offer_type=2);
    }
    
    private function mysql_date($html_input) {
        $fmt = Config::get('application.date_input_php');
        $dt = DateTime::createFromFormat($fmt, $html_input);
        return date("Y-m-d", $dt->getTimestamp());
    }
    
    public function action_new_post() {
        $input = array(
            'user_id'          => Input::get('user_id'),
            'offer_type'       => Input::get('offer_type'),
            
            'from_date'        => $this->mysql_date(Input::get('from_date')),
            'to_date'          => $this->mysql_date(Input::get('to_date')),
            
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
            $page = $input['offer_type'] == 1 ? 'offers/new_freight' : 'offers/new_trans';
            return Redirect::to($page)
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