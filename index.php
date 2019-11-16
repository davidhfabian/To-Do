<?php
require_once 'autoload.php';

if (!autenticador()) {
    header('location: task_list.php');
}

if ($_POST) {

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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.css">

    <link rel="stylesheet" href="styles/login.css">
</head>

<body>
    <div id="particles-js" >
        <div class="titulo" >
            <div class="content">
                <section class="login">

                    <form action="index.php" method="post">

                        <h2 class="title animated jello">Login To-Do</h2>


                        <div>
                            <label for="username">Email o Nombre de usuario</label><br>
                            <span class="error"><?=$error['username'] ?? ''?></span>
                            <input type="text" name="username" id="" autocomplete="off" value="<?=$username ?? ''?>">
                        </div>

                        <div>
                            <label for="password">Contraseña</label><br>
                            <span class="error"><?=$error['password'] ?? ''?></span>
                            <input type="password" name="password" id="" autocomplete="off">
                        </div>
                        <div>
                            <button type="submit">Iniciar sesion</button>
                        </div>
                    </form>
                    <div class="register">
                        <p>¿Todavia no tienes una cuenta?</p>
                        <a href="register.php">Registrate</a>
                    </div>
                </section>

            </div>
        </div>

    </div>
    <script src="scripts/particles.min.js"></script>
    <script src="scripts/app.js"></script>
</body>

</html>