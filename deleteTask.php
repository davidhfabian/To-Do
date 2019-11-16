<?php
include_once 'autoload.php';
require_once 'functions/database.php';

if (autenticador()) {
    header('location: index.php');
}

if ($_GET) {
    $id = $_GET['id'];
    $deleteTask = $conexion->prepare("DELETE FROM task WHERE id=$id LIMIT 1");
    $deleteTask->execute();
    $_SESSION['delete'] = 'Tarea eliminada con exito!';

    header('Location: task.php');
}
