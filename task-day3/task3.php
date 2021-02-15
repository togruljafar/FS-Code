<?php
    $array = [
        'cixarin',
        'keyfini',
        'gunun',
        'bu'
    ];

    function print_turn($array) {
        $arrLen = 0;        // entered Array length
        $turnedArr = [];    // new Array for push entered array value after turned
        // for find array length
        foreach($array as $item) {
            $arrLen++;
        }
        // turn our array element and push to new Array -> $turnedArr
        for($i=$arrLen-1; $i>=0; $i--) {
            $turnedArr[] = $array[$i];
        }

        echo "<pre>";
        print_r($turnedArr);
        echo "</pre>";
    }

    print_turn($array);
?>