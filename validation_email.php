<?php
session_start();
session_destroy();

if (isset($_GET['key']) && isset($_GET['id'])) {
    $key = $_GET['key'];
    $idUser = $_GET['id'];
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Email validado</h1>
    </div>
</body>
</html>
