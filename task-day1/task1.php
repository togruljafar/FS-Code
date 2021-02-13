<?php
    $sentence = " Bu cumlede tam-tamina alti soz var. ";
    $count = 0;
    // olasi yan bosluqlari sifirlamaq ucun
    $sentence = trim($sentence);

    for($i = 0; ; $i++) {
        if(empty($sentence[$i])) {
            break;  
        } else if ($sentence[$i] == " " || $sentence[$i] == ".") {
            $count++;
        }
    }

    echo $count;

?>