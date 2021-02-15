<?php
    $text1 = 'Ali:Rzayev:2000:ADPU';
    $text2 = '23/05/2020';
    
    function explodeEvent($text,$simvol) {
        $explodedArr = [];   // entered text explode by simvol and push to here
        $unit = '';          // word in text which we add here letter by letter in loop
        $i = 0;              // entered text index
        
        while(isset($text[$i])) {
            // added two parametr to condition. explode by simvol and by not set value 
            // because there is not simvol after last word
            if($text[$i] === $simvol || !isset($text[$i+1])) {
                if(!isset($text[$i+1])) {
                    $unit .= $text[$i];
                }
                $explodedArr[] = trim($unit);
                $unit = '';
            } else {
                $unit .= $text[$i];
            }
            $i++;
        }
        // print to screen => my result
        echo "<pre>";
        print_r($explodedArr);
        echo "</pre>";

    }

    explodeEvent($text1, ':');
    explodeEvent($text2, '/');
?>