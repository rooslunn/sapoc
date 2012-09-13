<?php

class Offer extends Eloquent {

    public static $timestamps = true;
    
    public static function search($inputs) {
        $heads = array(
            'auto_type', 'from_date', 'to_date', 'from_country', 'to_country',
            'from_town', 'to_town', 'comments', 'auto_price'
        );
        $rows = static::get($heads);
        return array('rows' => $rows, 'heads' => $heads);
    }
    
//    public function set_from_date($date) {
//        $this->set_attribute('from_date', RKUtils::mysql_date($date));
//    }
    
}