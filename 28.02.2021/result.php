<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/style.css" >
</head>
<body>
    <div class="container">
        <h2>Slide Show</h2>
        <div class="slide-content">
            <div class="slides">
                <?php 
                    $db = new PDO("mysql:host=localhost;dbname=fscode_intern","root","", array(
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                    ));
                
                    $sql = "SELECT * FROM `file_upload`";
                    $uploads = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                    foreach($uploads as $i => $upload) {
                        if($i===0) {
                            echo "<div class='slide first'>
                                <img src='".$upload['image_url']."' alt=''>
                            </div>";
                        } else {
                            echo "<div class='slide'>
                                <img src='".$upload['image_url']."' alt=''>
                            </div>";
                        }
                    }
                ?>
            </div>
            <div class="slide-nav">
                <div class="leftBtn"><i class="fas fa-chevron-left"></i></div>
                <div class="rightBtn"><i class="fas fa-chevron-right"></i></div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>