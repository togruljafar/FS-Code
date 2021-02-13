<?php
    $sentence = " Bu cumlede tam-tamina alti  soz var. ";
    $count = 0;
    //olasi artiq bosluqlari silmek ucun
    $sentence = trim($sentence);
    // cumlemi sozlere parcalayiram ve words arrayine elave edirem
    $word = '';
    $words = [];

    for($i = 0; isset($sentence[$i]) ; $i++) {
        if ($sentence[$i] == " " || $sentence[$i] == ".") {
            $word = trim($word);
            if(!empty($word)) {
                $words[] = $word;
                $word = '';
            }
        }
        $word .= $sentence[$i];
    }
    
    foreach($words as $value) {
        $count++;
    }

    echo $count;

?>
