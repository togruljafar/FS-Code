<?php
    $saat1 = '12:00';
    $saat2 = '03:30';
    $saat3 = '23:05';

    function setClock($clocks, $rank) {
        // verilen saati saat ve deqiqeye ayirmaq
        $clocks = explode(':', $clocks);
        $hour = (trim($clocks[0]));
        $minute = (trim($clocks[1]));
        $format = ''; // AM or PM format
        // elde etdiyimiz saati deqiqeye cevirmek
        $time = $hour * 60 + $minute;
        
        if($time/60 <= 12) {
            // return AM
            $hour = ($time - $minute) / 60;
            $format = "AM";
        } else {
            // return PM
            $hour = (($time - $minute) / 60) - 12;
            $format = "PM";
        }

        echo $rank." ".$hour.":".$minute." ".$format."<br>";

    }
    
    setClock($saat1, "1)");
    setClock($saat2, "2)");
    setClock($saat3, "3)");

?>