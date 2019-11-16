<?php
include_once 'autoload.php';
require_once 'functions/database.php';
// echo getcwd() . "\n";

if (!autenticador()) {
    header('location: task_list.php');
}

$resultadoConsulta = $conexion->prepare("select * from users");
$resultadoConsulta->execute();

if ($_POST) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];

    $error = validadorRegistro($_POST);

    // AGREGAR A BASE DE DATOS:
    if (empty($error)) {

        $agregarUsuario = $conexion->prepare("insert into users (name, username, email, password) value ('$name', '$username', '$email', '$password' )");
        $result = $agregarUsuario->execute();
        if ($result) {

            header("location: index.php");
        }

    }

}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro To-Do</title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.css">
    <link rel="stylesheet" href="styles/register.css">
</head>
<body>

    <div id="particles-js" >
        <div class="titulo" >
            <div class="content">
                 <section class="registro">
        <form action="register.php" method="post" >

                <h2 class="title" >Registro To-Do</h2>

            <div>
                <label for="name">Nombre Completo</label><br>
                <span class="error"><?=$error['name'] ?? ''?></span>
                <input type="text" name="name" id="" autocomplete="off" value="<?=$name ?? ''?>">
            </div>
            <div>
                <label for="username">Nombre de usuario</label><br>
                <span class="error"><?=$error['username'] ?? ''?></span>
                <input type="text" name="username" id="" autocomplete="off" value="<?=$username ?? ''?>">
            </div>
            <div>
                <label for="email">Email</label><br>
                <span class="error"><?=$error['email'] ?? ''?></span>
                <input type="email" name="email" id="" value="<?=$email ?? ''?>">
            </div>
            <div>
                <label for="password">Contraseña</label><br>
                <span class="error"><?=$error['password'] ?? ''?></span>
                <input type="password" name="password" id="" autocomplete="off">
            </div>
            <div>
                <button type="submit">Registrar</button>
            </div>

        </form>
    </section>

            </div>
        </div>

    </div>
    <script src="scripts/particles.min.js"></script>
    <script src="scripts/app.js"></script>
</body>
</html>