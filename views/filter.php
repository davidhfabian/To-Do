<?php

$filter = isset($_GET['filter']) ? $_GET['filter'] : '';
$finish = isset($_GET['finish']) ? (int) $_GET['finish'] : 0;

$filter = '%' . $filter . '%';
$tasks = $conexion->prepare("SELECT DISTINCT task.id, task.tarea, task.estado,task.descripcion, task.fecha_realizada FROM task_list INNER JOIN task ON task_list.id_user = $id_user AND task.id_task_list=$id_task_list AND task.estado = $finish WHERE task.tarea LIKE '$filter'");
$tasks->execute();
$tasks = $tasks->fetchAll();

?>
<div>

    <form action="task.php" method="get">
        <input type="text" name='filter' placeholder="Nombre de tarea" value='<?=$_GET['filter'] ?? ""?>'>
        <label >Finalizada: <input type="checkbox" name="finish" id='finish' value=1></label>
        <input type="submit" value="Filtrar">
    </form>

</div>
