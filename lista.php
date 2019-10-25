<?php
ini_set('display_errors', '1');


$user = 'root';
$password = '52752';
$filtro = '';

if (isset($_GET['filtro'])) {
    $filtro = $_GET['filtro'];
}



$conexion = mysqli_connect('localhost', $user, $password, 'e-coomerce-prueba');
$resultadoConsulta = mysqli_query($conexion, "select * from users where tarea like '%$filtro%'");


mysqli_close($conexion);

?>


<section class="tabla">
    <table>

        <tr class="titulos">
            <th>Estado</th>
            <th>Tarea</th>
            <th>Descripcion </th>
            <th>Fecha realizada </th>
            <th class="camp-btn"></th>


        </tr>
        <?php while ($array_fila = mysqli_fetch_array($resultadoConsulta)) { ?>
            <tr>
                <?php if ($array_fila['estado'] == 1) { ?>
                    <td>
                        <a href="#">
                            <i id="realizada" class="fas fa-check-circle"></i>
                        </a>
                    </td>
                <?php  } else { ?>
                    <td >
                        <a href="#">
                            <i id="inrealizada" class="fas fa-times-circle"></i></td>
                        </a>    
                <?php } ?>
                <td><strong class="tarea"><?= $array_fila['tarea'] ?></strong></td>
                <td class="description">
                    <p><?= $array_fila['descripcion'] ?></p>
                </td>
                <td> <?= $array_fila['fecha_realizada'] ?> </td>
                <td class="camp-btn">
                    <form class="form-eliminar" action="index.php" method="GET">
                        <input class="inputo" type="text" name="id" value="<?= $array_fila['id'] ?>">
                        <button class="tabla-btn" type="submit" name="edit"><i class="fas fa-edit"></i></button>
                        <button class="tabla-btn" type="submit" name="delite"><i class="fas fa-trash-alt"></i></i></button>
                    </form>
                </td>
            </tr>

        <?php } ?>
    </table>
</section>