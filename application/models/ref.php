<?php

class Ref extends Eloquent {

    public static $timestamps = true;
    
    public static function by_model_name($name) {
        $cfg = Config::get($name);
        $recs = static::where_ref_type($cfg['ref_type'])
                ->get(array('ref_id', 'ref_name'));
        $ds = array();
        foreach ($recs as $rec) {
            $value = explode(':', $rec->ref_name);
            $ds[$rec->ref_id] = $value[0];
        }
        return $ds;
    }
    
    public static function get_comparator($for_id) {
        $ref = static::where_ref_id($for_id)->first(array('ref_name'));
//        Log::info(print_r($ref, true));
//        return '=';
        $parts = explode(':', $ref->ref_name);
        if (count($parts) > 1)
            return $parts[1];
        else 
            return '=';
    }
    
    public static function auto_type_name($for_id) {
        $ref = Ref::where_ref_id($for_id)->get(array('ref_name'));
        $ref_name = explode(':', $ref[0]->ref_name);
        return $ref_name[0];
        
    }
}