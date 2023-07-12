<?php 
    function error_li($error){
        echo "<li>$error</li>";
    }

    session_start();
?>

<?php include "./templates/header.php" ?>
    <h1>Inicio Sesión</h1>
    <form action="./validation/login_validation.php" method="post">
        <label>Nombre
            <input type="text" name="name" placeholder="Nombre..." value="<?= !isset($_SESSION["user"])? "": $_SESSION["user"] ?>">
        </label>
        <label>Contraseña
            <input type="password" name="pass" placeholder="Contraseña..." value="<?= !isset($_SESSION["pass"])? "": $_SESSION["pass"] ?>">
        </label>
        <input type="submit" value="Iniciar Sesión">
        <div>
            <p>¿No tienes una cuenta? <a href="register.php">Crea una aquí</a></p>
        </div>
    </form><hr>
    <ul class="error">
        <?php
            if ($_GET) {
                $e = $_GET["error"];
                if ($e == "empty") {
                    error_li("Ningún campo puede estar vacío");
                }
                if ($e == "short_field") {
                    error_li("Ambos campos deben tener al menos 8 carácteres de largo");
                }
            }
        ?>
    </ul>
<?php include "./templates/footer.php" ?>