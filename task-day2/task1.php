<?php
    $text1 = "Proqramlasdirma";

    function getLetterCount($text) {
        $text = strtolower($text); //because php is not case sensitive and we make all the same
        // text write to screen 
        echo "Mətnimiz: ".'"'.$text.'"'."<br>";

        $letters = [];             // array for add to letters in text
        $length = 0;               // text length

        // take length of text and letter of text push to letters array
        for($i=0; isset($text[$i]); $i++) {
            $letters[] = $text[$i];
            $length++;
        }

        $count = 0;                // count of the same letter
        $letterChars = array();    // array for that add letter and its count 
        
        foreach($letters as $letter) {
            for($t=0; $t<$length; $t++) {
                if($letters[$t] === $letter) {
                    $count++;
                }
            }
            $letterChars[] = array("letter" => $letter, "count" => $count);
            $count = 0;
        }

        $minimizeLetter = array();      // remove letter which repeat
        $minimizeArrLength = 0;         // minimize letters array length

        //eliminate duplication
        foreach($letterChars as $chars) {
            foreach($minimizeLetter as $value) {
                if($chars == $value) {
                    continue 2;
                }
            }
            $minimizeLetter[] = $chars;
            $minimizeArrLength++;
        }

        $temp = 0; // substitute variable
        //we sort our array according to the count
        for($j=$minimizeArrLength-1;$j>=0;$j--){
            for($i=0; $i<$minimizeArrLength-1; $i++) {
                if($minimizeLetter[$i]['count'] > $minimizeLetter[$i+1]['count']) {
                    $temp = $minimizeLetter[$i];
                    $minimizeLetter[$i] = $minimizeLetter[$i+1];
                    $minimizeLetter[$i+1] = $temp;
                } 
            }
            echo $minimizeLetter[$j]["letter"]." - ".$minimizeLetter[$j]["count"]."<br>";

        }
    }

    getLetterCount($text1);

?>