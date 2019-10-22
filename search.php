<?php
ini_set('display_errors', '1');

$user = 'root';
$password = '52752';
$filtro = '';

if (isset($_GET['filtro'])) { 
    $filtro = $_GET['filtro'];
}

$conexion = mysqli_connect('localhost', $user, $password, 'e-coomerce-prueba');
$resultadoConsulta = mysqli_query($conexion, "select * from usuarios where name like '%$filtro%'");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Filtrar</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>


    <h1>listado de personas</h1>
    <section class="input-filter">
        <form method="get">
            <div>
                <input type="text" name="filtro" placeholder="Filtro" value="<?=$filtro ?? ''?>">
                <button type="submit">Filtrar</button>
            </div>
        
    </section>
    </form>
    <section class="filter">



        <table >
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
            </tr>

            <?php
            while ($fila = mysqli_fetch_array($resultadoConsulta)) {
                $nombre = $fila['name'];
                $username = $fila['username'];
                echo "<tr>";
                echo "<td>$nombre</td>";
                echo "<td>$username</td>";
                echo "<tr>";
            }
            ?>
        </table>

    </section>

</body>

</html>