<?php
include_once 'autoload.php';
require_once 'functions/database.php';

if (autenticador()) {
    header('location: index.php');
}

unset($_SESSION['taskList']);
$id = $_SESSION['id'];

$taskList = $conexion->prepare("SELECT * FROM task_list WHERE id_user = $id ORDER BY id DESC");
$taskList->execute();
$taskList = $taskList->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de tareas</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="styles/taskList.css">

    <link rel="stylesheet" href="styles/header.css">
</head>

<body>
    <?php require_once "Parents/header.php";?>
    <div>
        <h1 style="text-aline: center">Bienvenido <?=$_SESSION['name'] ?? 'Invitado'?>!</h1>
    </div>

        <h3>Listado de tareas</h3>
        <section class='tabla'>
            <table>
                <tr>
                    <td>
                        <form action="addTaskList.php" method="post">
                            <input type="text" name="name" id="addListTask"
                                placeholder='Agregar nueva lista de tareas'>
                            <button class='tabla-btn' type='submit' >Agregar</button>
                        </form>
                    </td>
                </tr>
                <?php foreach ($taskList as $task): ?>
                <tr>
                    <td>
                        <a href="task.php?t=<?=$task['id']?>">
                            <h3><?=$task['name']?></h3>

                        </a>
                    </td>

                </tr>
                <?php endforeach;?>

            </table>
        </section>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/js/all.min.js"></script>

</body>

</html>