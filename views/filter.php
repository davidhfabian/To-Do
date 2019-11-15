<?php
$filter = isset($_GET['filter']) ? $_GET['filter'] : '';
$finish = isset($_GET['finish']) ? (int) $_GET['finish'] : 0;

$filter = '%' . $filter . '%';
$tasks = $conexion->prepare("select * from task where tarea like '$filter' and estado = $finish");

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
