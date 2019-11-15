
    <header class="header">
        <div class="header-container container">
            <div class="logo-container">
                <a href="index.php">
                    <h1 class="logo">To-Do</h1>
                </a>
            </div>
            <div class="avatar-container">
                <a href="profile.php" id="btn-login">
                    <img class="avatar" src="../images/default.png" alt="avatar">
                </a>
            </div>
            <div class="menu-login">
                <nav>
                    <ul>
                        <?php ?>
                        <li><strong>Hola, <?=$_SESSION['name'] ?? 'Invitado'?>!</strong></li>
                        <!-- <li><a href="http://" >Iniciar sessiòn</a></li>
                        <li><a href="http://" >Registrate</a></li> -->
                        <li><a href="profile.php" >Mi perfil</a></li>
                        <li><a href="logout.php" >Cerrar session</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <script src="scripts/header-app.js"></script>