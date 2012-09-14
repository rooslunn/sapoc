<?php

class Offer extends Eloquent {

    public static $timestamps = true;
    
    public static function search($inputs, $columns) {
        $query = new static;
        foreach($inputs as $field => $value) {
            $query = $query->where($field, '=', $value);
        }
        $rows = $query->get($columns);
        return $rows;
    }
    
    public function get_auto_type_name() {
        $ref = Ref::where('ref_id', '=', $this->get_attribute('auto_type'))
                        ->get(array('ref_name'));
        return $ref[0]->ref_name;
    }
    
    public function get_load_period() {
        $date_str = RKUtils::format_mysqldate($this->get_attribute('from_date'), 'd.m');
        $to_date_str = RKUtils::format_mysqldate($this->get_attribute('to_date'), 'd.m');
        if ($date_str !== $to_date_str) {
            $date_str .= '—'.$to_date_str;
        }
        return $date_str;
    }
    
    public function get_route() {
        $fields = array(
            'from_country' => 'to_country',
            'from_town'    => 'to_town',
        );
        $route = array();
        foreach($fields as $from_value => $to_value) {
            $route[] = $this->get_attribute($from_value) . '—' . $this->get_attribute($to_value);
        }
        return implode('<br>', $route);
    }
    
    public function get_freight() {
        return $this->get_attribute('comments');
    }
    
    public function get_trans() {
        return $this->get_attribute('comments');
    }
    
    public function get_contacts() {
        if (Auth::guest()) {
            $s = 'Only for Registered';
        } else {
            $s = 'Contacts';    
        }
        return $s;
    }
    
//    public function set_from_date($date) {
//        $this->set_attribute('from_date', RKUtils::mysql_date($date));
//    }
    
}