<section class="tabla">
        <?php if (!empty($tasks)): ?>
    <table>
<span class="correct"><?=$_SESSION['delete'] ?? ''?></span>
        <tr class="titulos">
            <th class="estado">Estado</th>
            <th>Tarea</th>
            <th>Descripcion </th>
            <th class="fecha">Fecha realizada</th>
            <th class="camp-btn"></th>


        </tr>
        <?php foreach ($tasks as $task): ?>
            <tr>
                <?php if ($task['estado'] == 1) {?>
                    <td class="estado">
                        <a href="#">
                            <i id="realizada" class="fas fa-check-circle"></i>
                        </a>
                    </td>
                <?php } else {?>
                    <td class="estado">
                        <a href="#">
                            <i id="inrealizada" class="fas fa-times-circle"></i></td>
                    </a>
                <?php }?>
                <td><strong class="tarea"><?=$task['tarea']?></strong></td>
                <td class="description">
                    <p><?=$task['descripcion']?></p>
                </td>
                <td class="fecha"> <?=!empty($task['fecha_realizada']) ? date("d/m/Y", strtotime($task['fecha_realizada'])) : 'No realizada'?> </td>
                <td class="camp-btn">
                        <a class="tabla-btn" href='editTask.php?id=<?=$task['id']?>' ><i class="fas fa-edit"></i></a>
                        <a class="tabla-btn" href='deleteTask.php?id=<?=$task['id']?>' ><i class="fas fa-trash-alt"></i></i></a>
                </td>

            </tr>
        <?php endforeach?>
    </table>
    <?php else: ?>
    <div>
        <p class='alert'>No hay tareas para mostrar</p>
    </div>
    <?php endif?>
</section>