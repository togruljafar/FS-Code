<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
        form {
            width: 400px;
            margin: 100px auto 0 auto;
        }
    </style>
</head>
<body>
    <form action="action.php" method="POST" enctype="multipart/form-data">
        <h4 class="text-secondary">Enter Instagram Username</h4>
        <div class="form-group mt-5">
            <?php
                if(isset($_GET['user']) && $_GET['user'] === '?') {
                    echo "<div class='alert alert-danger' role='alert'>
                            Zəhmət olmasa Username əlavə edin!
                            </div>";
                } else if(isset($_GET['user']) && $_GET['user'] === 'error') {
                    echo "<div class='alert alert-warning' role='alert'>
                            Daxil edilən Username`də hesab mövcud deyil!
                            </div>";
                }
            ?>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
            <small id="emailHelp" class="form-text text-muted">We'll never share your information with anyone else.</small>
        </div>
        <button type="submit" name="submit" class="btn btn-success">Search</button>
    </form>
</body>
</html>