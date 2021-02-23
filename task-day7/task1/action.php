<?php


if(empty($_POST['pattern']) || empty($_POST['text'])) {
    header('Location:index.php?info=?');
} else {
    $pattern = $_POST['pattern'];
    $text   = $_POST['text'];

    echo "Pattern: $pattern <br>Text: $text <br>";

    if (preg_match("/$pattern/im", $text)) {

        preg_match_all("/$pattern/im", $text, $result);
        $result = $result[0];

        foreach($result as $i => $value) {
            echo ($i+1).") $value <br>";
        }

    } else {
        echo "<div class='alert alert-warning' role='alert'>
                Axtardığınız regexə uyğun nəticə tapılmadı
              </div>";
    }

    

}







?>