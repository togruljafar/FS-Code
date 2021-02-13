<?php 
    $text = "suretli kod yazmaq her zaman daha yaxsi kod yazmaq demek deyil. seliqeye ve hellin optimalligina da fikir verilmelidir.";
    $text = trim($text); // olasi yan bosluqlari sifirlamaq ucun
    $sentences = [];
    $myText = '';
    $dotIndexs = [];
    $lastIndex = 0;

    // noqtelerin indexini tapiriq ve arrayimizi elave edirik.
    for($i = 0; ; $i++) {
        if(empty($text[$i])) {
            break;
        } else if($text[$i] == ".") {
            $dotIndexs[] = $i;
        }
    }

    //tapdigimiz noqte indexlerine gore cumleleri ayiririq
    foreach($dotIndexs as $count) {
        for($i = 0; ; $i++) {
            if(empty($text[$i])) {
                break;
            } else if ($i >= $lastIndex && $i <= $count) {
                $myText .= $text[$i];
            }
        }
        $lastIndex = $count+1;
        $sentences[] = $myText;
        $myText = '';
    }

    // her cumlede ilk herfi boyuk yazmaq
    foreach($sentences as $sentence) {
        $sentence = trim($sentence);
        $sentence[0] = strtoupper($sentence[0]);

        echo $sentence." ";
    }

?>
