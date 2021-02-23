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
        <h4 class="text-secondary">Searching for Regex pattern in Text</h4>
        <?php
            if(isset($_GET['info']) && $_GET['info']==="?") {
                echo "<div class='alert alert-danger' role='alert'>
                        Zəhmət olmasa məlumatları daxil edin!
                        </div>";
            }
        ?>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Regex pattern</label>
            <input type="text" name="pattern" class="form-control" placeholder="Enter your number...">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Example text</label>
            <textarea class="form-control" name="text" rows="3"></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-primary mb-3">Search</button>
        <br>
        <?php 
            if(isset($_POST['submit'])) {
                include 'action.php'; 
            }
        ?>
    </form>
</body>
</html>