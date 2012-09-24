<?php

class Offer extends Eloquent {

    public static $timestamps = true;

    private static function comparator_by_name($name) {
        $conf = Config::get('models.search');
        $params = json_decode($conf[$name], true);
        if (array_key_exists('comparator', $params))
            return $params['comparator'];
        else
            return null;
    }

    private static function comparator ($name, $value) {
        $comparator = self::comparator_by_name($name);
        if (isset($comparator)) {
            $name = str_replace(array('_from', '_to'), array('', ''), $name);
        } else {
            if (Ref::is_ref_field($name))
                $comparator = Ref::comparator_by_id($value);
            else 
                $comparator = '=';
        }
        return array('f' => $name, 'c' => $comparator);
    }
    
    public static function search($inputs, $columns) {
        $query = new static;
        foreach($inputs as $field => $value) {
            $p = self::comparator($field, $value);
            $query = $query->where($p['f'], $p['c'], $value);
        }
        $rows = $query->get($columns);
        return $rows;
    }
    
    public function get_auto_type_name() {
        return Ref::ref_name_by_id($this->auto_type);
    }
    
    public function get_load_period() {
        $date_str = RKUtils::format_mysqldate($this->from_date, 'd.m');
        $to_date_str = RKUtils::format_mysqldate($this->to_date, 'd.m');
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
            // $route[] = $this->get_attribute($from_value) . '—' . $this->get_attribute($to_value);
            $route[] = $this->$from_value . '—' . $this->$to_value;
        }
        return implode('<br>', $route);
    }
    
    public function get_freight() {
        return $this->comments;
    }
    
    public function get_trans() {
        return $this->comments;
    }
    
    public function get_contacts() {
        if (Auth::guest()) {
            $s = 'Only for Registered';
        } else {
            $u = User::find($this->user_id);
            // $s = 'Contacts for '.print_r($u, true);    
            $s = $u->email . '<br>' . $u->phone_1;    
        }
        return $s;
    }
    
//    public function set_from_date($date) {
//        $this->set_attribute('from_date', RKUtils::mysql_date($date));
//    }
    
}