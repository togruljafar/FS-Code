<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
    <form action="action.php" method="POST" enctype="multipart/form-data; charset=utf-8">
        <h4 class="text-secondary">Encrypt the your conversation</h4>
        <?php
            if(isset($_GET['info']) && $_GET['info']==="?") {
                echo "<div class='alert alert-danger' role='alert'>
                        Zəhmət olmasa məlumatları daxil edin!
                        </div>";
            }
        ?>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Your Number</label>
            <input type="number" name="number" class="form-control" placeholder="Enter your number...">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
            <textarea class="form-control" name="text" rows="3"></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-primary mb-3">Confirm identity</button>
    </form>
</body>
</html>