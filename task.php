<?php
include_once 'autoload.php';
require_once 'functions/database.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de tareas</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="styles/lista.css">
    <link rel="stylesheet" href="styles/agregar.css">
    <link rel="stylesheet" href="styles/header.css">
</head>

<body>
    <?php require_once "Parents/header.php";?>
    <div>
        <h1 style="text-aline: center">Bienvenido <?=$_SESSION['name'] ?? 'Invitado'?>!</h1>
    </div>

  <?php
require_once 'views/filter.php';
require_once "views/lista.php";
require_once "views/addTarea.php";
deleteAlert();
?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/js/all.min.js"></script>

</body>

</html>