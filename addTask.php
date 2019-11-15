<?php
include_once 'functions/database.php';
session_start();

if (isset($_POST['addTask'])) {
    $error = [];
    $tarea = isset($_POST['tarea']) ? trim($_POST['tarea']) : '';
    $descripcion = isset($_POST['descripcion']) ? trim($_POST['descripcion']) : '';
    if (strlen($tarea) > 3) {
        $addTask = $conexion->prepare("insert into task (tarea, estado, descripcion) values ('$tarea', 0, '$descripcion')");
        $addTask = $addTask->execute();
        if ($addTask) {
            $_SESSION['correct'] = 'Tarea agregada';

        } else {
            $_SESSION['error'] = 'La tarea no se pudo agregar a la base de datos';
        }

    } else {
        $_SESSION['error'] = 'El nombre de la tarea debe ser de mas de tres caracteres';
    }
}

header('location: task.php');
