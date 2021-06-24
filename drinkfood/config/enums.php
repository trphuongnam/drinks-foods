<?php
    return[
        'productTypes'=>[
            '1' => "foods",
            '2' => "drinks",
        ],

        //Type fillter
        'filterType'=>[
            'az' => 1,
            'price_low_hight' => 2,
            'price_hight_low' => 3
        ],
        
        // Type user
        'userTypes' => [
            'normalUser' => 0,
            'admin' => 1,
            'manager' => 2
        ],

        //Status display
        'statusDisplay' => [
            'display' => 1,
            'hidden' => 2
        ],

        /* User status */
        'userStatus' => [
            'active' => 1,
            'blocked' => 2
        ]
    ];
?>