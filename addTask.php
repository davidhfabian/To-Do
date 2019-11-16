<?php
require_once 'autoload.php';
include_once 'functions/database.php';

if (autenticador()) {
    header('location: index.php');
}

$id_task_list = (int) $_SESSION['taskList'];
$id_user = (int) $_SESSION['id'];

// var_dump($id_user, $id_task_list);
// die();
if (isset($_POST['addTask'])) {
    $error = [];
    $tarea = isset($_POST['tarea']) ? trim($_POST['tarea']) : '';
    $descripcion = isset($_POST['descripcion']) ? trim($_POST['descripcion']) : '';
    if (strlen($tarea) > 3) {
        $addTask = $conexion->prepare("insert into task (id_user, id_task_list, tarea, estado, descripcion) values ($id_user, $id_task_list, '$tarea', 0, '$descripcion')");
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

header("location: task.php");
