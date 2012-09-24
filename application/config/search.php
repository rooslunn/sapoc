<?php

return array(
    'freight' => array(
        'offer_type'     => 1,
        'search_columns' => '["user_id","auto_type","from_date","to_date","from_country","to_country","from_town","to_town","comments","auto_price"]',
        'view_columns'   => '["auto_type_name","load_period","route","freight","price","contacts"]'
    ),
    'trans' => array(
        'offer_type'     => 2,
        'search_columns' => '["user_id","auto_type","from_date","to_date","from_country","to_country","from_town","to_town","comments","auto_price"]',
        'view_columns'   => '["auto_type_name","load_period","route","trans","price","contacts"]'
    ),
);