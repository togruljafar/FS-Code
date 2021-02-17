
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Color Game</title>
    <style>
        .content {
            width:100%;
            height: 50vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
        }
        .content h1, .content p {
            width:100%;
            text-align: center;
        }
        .cubic {
            width:100px;
            height:100px;
            border-radius: 50%;
            margin-right: 50px;
            cursor: pointer;
            outline: none;
            border:none;
        }
        .cubic:last-child {
            margin-right: 0;
        }
        .cubic:hover {
            height: 97px;
            box-shadow: 0px 3px 3px #555 
        }
    </style>
</head>
<body>
    <form class="content" method="POST" enctype="multipart/form-data">
        <h1>Guest Color!</h1>

    