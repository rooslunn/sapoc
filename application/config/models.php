<?php 

return array(
    'search' => array(
        'from_country'  => '{"type":"text"}',
        'from_district' => '{"type":"text"}',
        '1' => '{"type":"legend"}',
        'to_country'    => '{"type":"text"}',
        'to_district'   => '{"type":"text"}',
        '2' => '{"type":"legend"}',
        'auto_type'     => '{"type":"select", "source":"refs.auto_type"}',
        'load_date'     => '{"type":"date"}',
        '3' => '{"type":"legend"}',
        'weight_from'   => '{"type":"text", "rule":"numeric"}',        
        'weight_to'     => '{"type":"text", "rule":"numeric"}',        
    ),
);