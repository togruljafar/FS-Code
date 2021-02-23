<?php
    $db = new PDO("mysql:host=localhost;dbname=fscode_intern","root","", array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));

    // print image url from database
    $sql = "SELECT * FROM `file_upload`";
    $uploads = $db->query($sql)->fetchALl(PDO::FETCH_ASSOC);
    echo "<h4>Links all of uploaded images</h4>";
    foreach($uploads as $i => $upload) {
        $row = $i+1;
        echo "$row) ".$upload['image_url']."<br>";
    }
    echo "<a href='index.php'>Geri qayit</a>";
?>