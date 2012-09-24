<?php 

return array(
    'search' => array(
        'offer_type'    => '{"type":"hidden"}',
        'from_country'  => '{"type":"text"}',
        'from_district' => '{"type":"text"}',
        '1' => '{"type":"legend"}',
        'to_country'    => '{"type":"text"}',
        'to_district'   => '{"type":"text"}',
        '2' => '{"type":"legend"}',
        'auto_type'     => '{"type":"select", "source":"refs.auto_type"}',
        'load_date'     => '{"type":"date"}',
        '3' => '{"type":"legend"}',
        'auto_capacity_from'   => '{"type":"text", "rule":"numeric","comparator":">="}',        
        'auto_capacity_to'     => '{"type":"text", "rule":"numeric","comparator":"<="}',        
        'auto_volume_from'   => '{"type":"text", "rule":"numeric","comparator":">="}',        
        'auto_volume_to'     => '{"type":"text", "rule":"numeric","comparator":"<="}',
        'legend01' => '{"type":"legend"}',
        'legend02' => '{"type":"legend"}',
        'legend03' => '{"type":"legend"}',
        'legend04' => '{"type":"legend"}',
    ),
);