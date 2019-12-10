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

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="styles/profile.css">
    <link rel="stylesheet" href="styles/header.css">
</head>

<body>
    <?php require_once "Parents/header.php"?>
<div class="container">
 <div class="row">
		<div class="col-lg-3 col-sm-6">

            <div class="card hovercard">
                <div class="cardheader" style="background:url(http://f.fwallpapers.com/images/beautiful-nature-554.jpg) no-repeat">

                </div>
                <div class="avatar">
                    <a href="http://www.doweb.in/"><img alt="" src="images/default.png"></a>
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" href="http://www.doweb.in/"> </a>
                    </div>
                    <div class="desc"><?=$_SESSION['email'] ?? 'ejemplo@ejemplo.com'?></div>
                    <div class="desc"><?=$_SESSION['name'] ?? 'Usuario'?></div>
                </div>
                <div class="bottom">
                    <a class="btn btn-primary btn-twitter btn-sm" href="http://www.doweb.in/" target="_blank">
                        <i class="fa fa-youtube"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" rel="publisher"
                       href="http://www.doweb.in/" target="_blank">
                        <i class="fa fa-google-plus"></i>
                    </a>
                    <a class="btn btn-primary btn-sm" rel="publisher"
                       href="http://www.doweb.in/" target="_blank">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a class="btn btn-warning btn-sm" rel="publisher" href="http://www.doweb.in/" target="_blank">
                        <i class="fa fa-linkedin"></i>
                    </a>
                </div>
            </div>

        </div>

	</div>

</div>

</body>

</html>


