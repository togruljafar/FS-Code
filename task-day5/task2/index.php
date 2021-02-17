<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px;
        }
        td {
            height: 30px;
        }
    </style>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="numInp">Dəyər daxil edin: </label>
        <input type="number" id='numInp' name='number' step="0.01">
        <input type="submit" name='submit' value='Göndər'>
    </form>
    <table style="width:700px; margin-top:100px">
        <tr>
            <th>İstifadəçinin daxil etdiyi ədəd = x</th>
            <th>Natural ədəd < x</th>
            <th>Natural ədəd > x</th>
        </tr>
        <?php include('action.php');?>
    </table>
</body>
</html>