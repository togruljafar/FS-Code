<?php
session_start();
if(empty($_POST['number']) || empty($_POST['text'])) {
    header('Location:index.php?info=?');
} else {
    $number = $_POST['number'];
    $text   = $_POST['text'];

    // echo "Number: $number <br>Text: $text <br>";
    $encrypted = encrypeText($number,$text);
    $_SESSION["number"] = $number;
    $_SESSION["text"] = $text;
    $_SESSION["encrypted"] = $encrypted;

    header('Location:result.php');
}

function encrypeText($number, $text) {
    $alphabet = ["a","b","c","ç","d","e","ə","f","g","ğ","h","x","ı","i","j","k","q","l","m","n","o","ö","p","r","s","ş","t","u","ü","v","y","z"];
    $number = $number % count($alphabet);   // if number more than alphabet count

    $chars = [];   // for chars of text
    $textLen = mb_strlen($text);
    // utf-8 chars add array
    while ($textLen) {
        $chars[] = mb_substr($text,0,1,"UTF-8");
        $text = mb_substr($text,1,$textLen,"UTF-8");
        $textLen = mb_strlen($text);
    }
    // encrypted text
    $encrypted = '';
    // chars loop
    foreach($chars as $key => $char) {
        // alphabet loop
        foreach($alphabet as $index => $alphabe) {
            if($char === " ") {
                $encrypted .= $char;
            } else if($char === $alphabe) { // lower case
                if($index+$number > count($alphabet)-1) {
                    $i = $index+$number - count($alphabet);
                    $encrypted .= $alphabet[$i];
                } else if($number+$index < 0) {
                    $i = count($alphabet) + $index+$number;
                    $encrypted .= $alphabet[$i];
                } else {
                    $encrypted .= $alphabet[$index+$number];
                }
            } else if($char === mb_strtoupper($alphabe, 'UTF-8')) { // upper case
                if($index+$number > count($alphabet)-1) {
                    $i = $index+$number - count($alphabet);
                    $encrypted .= mb_strtoupper($alphabet[$i], 'UTF-8');
                } else if($number+$index < 0) {
                    $i = count($alphabet) + $index+$number;
                    $encrypted .= mb_strtoupper($alphabet[$i], 'UTF-8');
                } else {
                    $encrypted .= mb_strtoupper($alphabet[$index+$number], 'UTF-8');
                }
            }
        }
        
        if(preg_match("/([?!,.])/i", $char)) {
            $encrypted .= $char;
        }
    }
    return $encrypted;
}

?>