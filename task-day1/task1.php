<?php
    $sentence = " Bu cumlede tam-tamina alti  soz var.. ";
    $count = 0;
    $sentence = trim($sentence); // olasi artiq bosluqlari sifirlamaq ucun
    // cumlemi sozlere parcalayriram ve words arrayine elave edirem
    $word = '';
    $words = [];

    for($i = 0; isset($sentence[$i]) ; $i++) {
        if ($sentence[$i] == " " || $sentence[$i] == ".") {
            $word = trim($word);
            if(!empty($word) && $word != ".") {
                $words[] = $word;
            }
            $word = '';
        }
        $word .= $sentence[$i];
    }
    
    foreach($words as $value) {
        echo $value."<br>";
        
        $count++;
    }

    echo $count;

?>
