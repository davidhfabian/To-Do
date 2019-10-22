<?php
ini_set('display_errors', '1');
include_once('autoload.php');

$user = 'root';
$password = '52752';
$filtro = '';
if (isset($_GET['filtro'])) { 
    $filtro = $_GET['filtro'];
}

$whileTarea = "where tarea";
$conexion = mysqli_connect('localhost', $user, $password, 'e-coomerce-prueba');
$resultadoConsulta = mysqli_query($conexion, "select * from users where tarea like '%$filtro%'");
 if (isset($_GET['id']) ) {
         $borrar = $_GET['id'];
         $borrado = mysqli_query($conexion, ("delete from users where id=$borrar"));
    
        header('location: index.php');
    
     }
    if ($_POST) {
        
    $tarea = $_POST['tarea'] ?? '';
    $descripcion = $_POST['descripcion'] ?? '';
    $_SESSION['error'] = '';
    $_SESSION['correct'] = '';
    if (strlen($tarea) > 3) {
        $agrega = mysqli_query($conexion, "insert into users (tarea, estado, descripcion, fecha_realizada) values ('$tarea', 0, '$descripcion', 'pendiente')");
        if($agrega){
            $_SESSION['correct'] = "Registro agregado";
        }
        
        header('location: index.php');
    } else {
        $_SESSION['error'] = "No se pudo agregar el registro en las base de datos";
    }
}


$cantidadRegistros = mysqli_num_rows($resultadoConsulta);
// var_dump($cantidadRegistros) ;


mysqli_close($conexion);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ToDo</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="styles/lista.css">
    <link rel="stylesheet" href="styles/agregar.css">
    <link rel="stylesheet" href="styles/header.css">
</head>

<body>
    <?php require_once("Parents/header.php"); ?>
    <div>
        <h1 style="text-aline: center">Bienvenido <?=$_SESSION['name'] ?? 'Usuario'?>!</h1>
    </div>
    <!-- <section class="input-filter">
        <h3>Filtrado</h3>
        <form method="get">
            <div>
                <input type="text" name="filtro" placeholder="Filtro" value="<?=$filtro ?? ''?>">
            </div>
            <div class="terminada">
                <label for="terminada">Terminada <input type="checkbox" name="terminada" >
                </label>
            </div>
            <button type="submit">Filtrar</button>
            </form>
        
    </section> -->
    <?php 
    require_once("lista.php");
    require_once("addTarea.php");
    ?>
   
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/js/all.min.js"></script>

</body>

</html>