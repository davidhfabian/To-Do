<?php require_once "autoload.php";

if (autenticador()) {
    header('location: index.php');
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mi perfil</title>
    <link rel="stylesheet" href="styles/profile.css">
    <link rel="stylesheet" href="styles/header.css">
</head>

<body>
    <?php require_once "Parents/header.php"?>
    <main>
        <section>

            <img src="images/default.png" alt="avatar">
            <div>
                <h3><?=$_SESSION['name'] ?? 'Usuario'?></h3>
                <P><?=$_SESSION['email'] ?? 'ejemplo@ejemplo.com'?></P>
            </div>
            <div>
                <button>Editar Perfil</button>
            </div>
        </section>
    </main>
</body>

</html>