<?php
require_once 'functions/database.php';

if ($_GET) {
    $id = $_GET['id'];
    $deleteTask = $conexion->prepare("DELETE FROM task WHERE id=$id LIMIT 1");
    $deleteTask->execute();
}
