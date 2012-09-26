<?php 

return array(
    'search' => array(
        'offer_type'    => '{"type":"hidden"}',
        'from_country'  => '{"type":"text"}',
        'from_district' => '{"type":"text"}',
        'legend01' => '{"type":"legend"}',
        'to_country'    => '{"type":"text"}',
        'to_district'   => '{"type":"text"}',
        'legend02' => '{"type":"legend"}',
        'auto_type'     => '{"type":"select", "source":"refs.auto_type"}',
        'load_date'     => '{"type":"date"}',
        'legend03' => '{"type":"legend"}',
        'auto_capacity_from'   => '{"type":"text", "rule":"numeric","comparator":">="}',        
        'auto_capacity_to'     => '{"type":"text", "rule":"numeric","comparator":"<="}',        
        'auto_volume_from'     => '{"type":"text", "rule":"numeric","comparator":">="}',        
        'auto_volume_to'       => '{"type":"text", "rule":"numeric","comparator":"<="}',
    ),
    
    'register' => array(
        'code'     => '{"type":"hidden"}',
        'email1'   => '{"type":"hidden"}',
        'email'    => '{"type":"readonly"}',
        'password' => '{"type":"password","rule":"required"}',
        'legend01' => '{"type":"legend"}',
        'company'  => '{"type":"text"}',
    ),
);