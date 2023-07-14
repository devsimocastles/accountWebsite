<?php
    session_start();
    if (isset($_SESSION) && $_SESSION["logged"] == TRUE) {
?>
    <?php 
        include "./templates/header.php";
    ?>
        <header>
            <nav>
                <ul>
                    <li><a href="profile.php">Ver Perfil</a></li>
                    <li><a href="cerrar_sesion.php?cerrarSesion">Cerrar Sesión</a></li>
                </ul>
            </nav>
        </header>
        <h1>Bienvenido, <?= $_SESSION["user"] ?></h1>
        <p>Puedes ver tu perfil <a href="profile.php">acá</a></p>
    <?php 
        include "./templates/footer.php";
    ?>
<?php
    }
    else{
        header("location: login.php?error=not_logged");
    }
?>