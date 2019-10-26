<?php
include_once('autoload.php');

$user = 'root';
$password = '52752';
$conexion = mysqli_connect('localhost', $user, $password, 'e-coomerce-prueba');
$resultadoConsulta = mysqli_query($conexion, "select * from usuarios");


if($_POST){
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    
    $error = validadorRegistro($_POST);

    // AGREGAR A BASE DE DATOS:
    if(empty($error)) {
        // $_SESSION['id'] = $_POST['id'];
        $_SESSION['name'] = $name;
        $agregarUsuario = mysqli_query($conexion, "insert into usuarios (name, username, email, password) value ('$name', '$username', '$email', '$password' )");
        header("location: index.php");

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
    <link rel="stylesheet" href="styles/register.css">
</head>
<body>
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
</body>
</html>