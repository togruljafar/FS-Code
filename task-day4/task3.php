<?php
$array = [
    'C:/',
    [
        'Windows',
        [
            'system',
            'system32'
        ],
        'Users',
        [
            'Ali',
            [
                'Documents',
                'Pictures'
            ],
            'guests',
            [
                'Documents'
            ]
        ]
    ]
];

    function toTree($datas, $tabCount = 0){
        $tab = str_repeat("&nbsp", $tabCount);
        foreach($datas as $key => $data) {
            if(is_string($data)) {
                echo $tab.$data."<br>";
            } else if(is_array($data)) {
                $tabCount++;
                toTree($data,$tabCount);
                $tabCount--;
            }
        }
    }
    toTree($array);
?>