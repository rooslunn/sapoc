<?php

class Ref extends Eloquent {

    public static $timestamps = true;
    
    public static function by_name($name) {
        $cfg = Config::get($name);
        $recs = static::where_ref_type($cfg['ref_type'])
                ->get(array('ref_id', 'ref_name'));
        $ds = array();
        foreach ($recs as $rec) {
            $ds[$rec->ref_id] = $rec->ref_name;
        }
        return $ds;
    }
    
}