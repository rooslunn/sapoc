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
    
    public static function comparator_by_id($for_id) {
        $ref = static::where_ref_id($for_id)->first(array('ref_comparator'));
        return $ref->ref_comparator;
    }

    public static function is_ref_field($name) {
        return array_key_exists($name, Config::get('refs'));
    }
    
    public static function ref_name_by_id($for_id) {
        $ref = Ref::where_ref_id($for_id)->first(array('ref_name'));
        return $ref->ref_name;
    }
}