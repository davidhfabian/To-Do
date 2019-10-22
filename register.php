<?php
include_once('inicio.php');

$user = 'root';
$password = '52752';


$conexion = mysqli_connect('localhost', $user, $password, 'e-coomerce-prueba');
$resultadoConsulta = mysqli_query($conexion, "select * from usuarios");

$error = [];
if($_POST){
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    
    // VALIDACION NOMBRE 
    if(strlen($name) === 0){
        $error['name'] = 'llena este campo';
    } else if (strlen($name) < 5){
        $error['name'] = 'min 5 caracteres';
    } else if (preg_match_all('/[0-9]+/', $name)){
        $error['name'] = 'Nombre no puede contener numeros';
    }
    // VALIDACION USERNAME
    if(strlen($username) === 0){
        $error['username'] = 'llena este campo';
    } else if (strpos($username, ' ')) {

        $error['username'] = 'Tu nombre de usuario no debe tener espacios';
    }
    // VALIDACION EMAIL
    if(strlen($email) === 0){
        $error['email'] = 'llena este campo';
    }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $error['email'] = 'El formato de email es incorrecto';
    }
    // VALIDACION PASSWORD
    if(strlen($_POST['password']) === 0){
        $error['password'] = 'llena este campo';
    } else if (strlen($_POST['password']) > 16) {

        $error['password'] = 'La clave debe tener menos de 16 caracteres';
    } else if (!preg_match('`[a-z]`', $_POST['password'])) {

        $error['password'] = "La clave debe tener al menos una letra minúscula";
    } else if (!preg_match('`[A-Z]`', $_POST['password'])) {

        $error['password'] = "La clave debe tener al menos una letra mayuscula";
    } else if (!preg_match('`[0-9]`', $_POST['password'])) {

        $error['password'] = "La clave debe tener al menos un caracter numerico";
    }
    

    // AGREGAR A BASE DE DATOS:

    if(empty($error)) {
        $_SESSION['neme'] = $name;
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
    <title>Registro</title>
    <link rel="stylesheet" href="styles/register.css">
</head>
<body>
    <section class="registro">
        <form action="register.php" method="post" > 
            
                <h2 class="title" >Registro To-Do</h2>
            
            <div>
                <label for="name">Nombre Completo</label><br>
                <span class="error"><?=$error['name'] ?? ''?></span>
                <input type="text" name="name" id="" autocomplete="off" value="<?=$name?>">
            </div>
            <div>
                <label for="username">Nombre de usuario</label><br>
                <span class="error"><?=$error['username'] ?? ''?></span>
                <input type="text" name="username" id="" autocomplete="off" value="<?=$username?>">
            </div>
            <div>
                <label for="email">Email</label><br>
                <span class="error"><?=$error['email'] ?? ''?></span>
                <input type="email" name="email" id="" value="<?=$email?>">
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