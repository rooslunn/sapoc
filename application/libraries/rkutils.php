<?php

class RKUtils {

    public static function mysql_date($input) {
        $date_format = Config::get('application.date_input_php');
        $dt = DateTime::createFromFormat($date_format, $input);
        return date("Y-m-d", $dt->getTimestamp());
        
    }
}
