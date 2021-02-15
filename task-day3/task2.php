<?php
    $cities = [
        'Baku',
        'London',
        'Paris',
        'Barcelona',
        'Istanbul'
    ];
    $search_1 = 'Paris';

    function searchIn($datas,$item) {   // $datas = array; $item = search item
        $result = false;    // default value => false
        // if our item has in datas => return true
        foreach($datas as $data) {
            if($data === $item) {
                $result = true;
            }
        }

        $result = $result ? 'true' : 'false';

        echo $item." => ".$result;
    }
    
    searchIn($cities,$search_1);

?>