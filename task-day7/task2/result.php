<?php
    session_start();

    $number = $_SESSION["number"];
    $text = $_SESSION["text"];
    $encrypted = $_SESSION["encrypted"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
        form {
            width: 700px;
            margin: 100px auto 0 auto;
        }
    </style>
</head>
<body>
    <form action="#" method="POST" enctype="multipart/form-data">
        <h4 class="text-secondary">Encrypt the your conversation</h4>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Result textarea</label>
            <textarea class="form-control" rows="3"><?=$encrypted;?></textarea>
            <button type="submit" name="submit" class="btn btn-success my-3">Decode Text</button>
            <br>
            <?php
                if(isset($_POST['submit'])) {
                    echo '<label for="exampleFormControlTextarea1" class="form-label">DeEncrypt textarea</label>
                          <textarea class="form-control" rows="3">'.$text.'</textarea>
                          <button type="submit" name="back" class="btn btn-success my-3">Go Back</button>';
                } else if(isset($_POST['back'])) {
                    header('Location:index.php');
                }

            ?>
        </div>
    </form>
</body>
</html>