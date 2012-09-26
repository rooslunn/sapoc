<?php

class RKUtils {

    public static function get_mysql_date($input) {
        $date_format = Config::get('application.date_input_php');
        $dt = DateTime::createFromFormat($date_format, $input);
        return date("Y-m-d", $dt->getTimestamp());
        
    }
    
    public static function format_mysqldate($mysqldate, $format) {
        $date = strtotime($mysqldate);
        return date($format, $date);
    }

    public static function model_to_array($data, $column_name) {
    	$res = array();
    	foreach ($data as $rec) {
    		$res[] = $rec->$column_name;
    	}
    	return $res;
    }
}
