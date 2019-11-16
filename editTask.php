<?php
include_once 'autoload.php';
require_once 'functions/database.php';

if (autenticador()) {
    header('location: index.php');
}

if (isset($_POST['editTask'])) {
    $id = $_GET['task'];
    var_dump("entra podt");
    $tarea = isset($_POST['tarea']) ? trim($_POST['tarea']) : '';
    $descripcion = isset($_POST['descripcion']) ? trim($_POST['descripcion']) : '';
    $estado = isset($_POST['estado']) ? trim($_POST['estado']) : 0;
    $fecha = "null";
    if (strlen($tarea) > 3) {
        if ($estado == 1) {
            $fecha = 'CURDATE()';
        }
        $addTask = $conexion->prepare("UPDATE task SET tarea= '$tarea', descripcion = '$descripcion', estado=$estado, fecha_realizada=$fecha WHERE id=$id");
        $addTask = $addTask->execute();
        if ($addTask) {
            header('Location: task.php');

        } else {
            $error['error'] = 'La tarea no se pudo guardar';
        }

    } else {
        $error['error'] = 'El nombre de la tarea debe ser de mas de tres caracteres';
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    var_dump("entra get");

    $editTask = $conexion->prepare("SELECT * FROM task WHERE id = $id LIMIT 1");
    $editTask->execute();
    $task = $editTask->fetch();
}
$estado = array(0 => 'Pendiente', 1 => 'Realizado');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Tarea</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="styles/editTask.css">
    <link rel="stylesheet" href="styles/header.css">
</head>

<body>
     <?php require_once "Parents/header.php";?>
    <section class='editTask'>
        <form action="editTask.php?task=<?=$id?>" method="post" class='edit'>
            <div class="alert">
                <span class="error"><?=$error['error'] ?? ''?></span>
                <span class="correct"><?=$error['correct'] ?? ''?></span>
            </div>
            <div>
                <label for="tarea">Tarea</label><br>
                <input type="text" name="tarea" autocomplete="off" value='<?=$task['tarea']?>'>
            </div>
            <div>
                <label for="descripcion">Descripcion</label><br>
                <textarea name="descripcion" id="" cols="30" rows="5"><?=$task['descripcion']?></textarea>
            </div>
            <div>
                <label for="estado">Estado</label>
                <select name="estado" id="estado">

                    <?php foreach ($estado as $key => $value): ?>
                    <option value="<?=$key?>" <?=$task['estado'] == $key ? "selected=selected" : ''?>> <?=$value?> </option>
                    <?php endforeach?>
                </select>
            </div>
            <div class="button">
                <button type="submit" name='editTask'><i class="fas fa-plus"></i>Guardar</button>
            </div>
        </form>

    </section>
</body>

</html>