<?php 
    $x = 4;
    $y = 6;
    $text = "Bu gunluk son tapsiriq.";
    
    // index 0-dan basladigi ucun bir say geriden hesablamaliyiq
    $x = $x -1;
    // y qeder herf kesmeli oldugumuz ucun x ile y-i toplayiriq 
    $y = $x + $y;
    $myword = '';

    for($i = $x; $i<$y ; $i++) {
        $myword .= $text[$i];
    }

    echo $myword;
?>
