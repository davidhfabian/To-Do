<?php
    require_once('autoload.php');

    if($_POST){
        
        $error = validadorLogin($_POST);

        $username = $_POST['username'];
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login ToDO</title>
    <link rel="stylesheet" href="styles/login.css">
</head>

<body>
    <section class="login">
        <form action="login.php" method="post">

            <h2 class="title">Login To-Do</h2>


            <div>
                <label for="username">Email o Nombre de usuario</label><br>
                <span class="error"><?= $error['username'] ?? '' ?></span>
                <input type="text" name="username" id="" autocomplete="off" value="<?= $username ?? '' ?>">
            </div>

            <div>
                <label for="password">Contraseña</label><br>
                <span class="error"><?= $error['password'] ?? '' ?></span>
                <input type="password" name="password" id="" autocomplete="off">
            </div>
            <div>
                <button type="submit">Iniciar sesion</button>
            </div>

        </form>
    </section>
</body>

</html>