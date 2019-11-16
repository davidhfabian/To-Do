<?php
include_once 'autoload.php';
require_once 'functions/database.php';

if (autenticador()) {
    header('location: index.php');
}

if (isset($_POST)) {

    $name = $_POST['name'];
    $id = $_SESSION['id'];

    $addTaskList = $conexion->prepare("INSERT INTO task_list (id_user, name) VALUES ($id, '$name')");
    $result = $addTaskList->execute();
    var_dump($result);

    if ($result) {
        header('location: task_list.php');
    }

}
