<?php

class Offer extends Eloquent {

    public static $timestamps = true;
    
    public static function search($inputs, $columns) {
        $rows = static::get($columns);
        return $rows;
    }
    
    public function get_auto_type_name() {
        return 'tent';
    }
    
    public function get_load_period() {
        return '21.06 - 31.12';
    }
    
    public function get_route() {
        return 'RUS—UA<br>Odesska—Luganska<br>Odessa—Lugansk';
    }
    
    public function get_freight() {
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