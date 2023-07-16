<?php
    include "./functions/error_li.php";

    session_start();
    if (isset($_SESSION) && $_SESSION["logged"] == TRUE) {
?>
    <?php include "./templates/header.php" ?>
    <header>
            <nav>
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="cerrar_sesion.php?cerrarSesion">Cerrar Sesión</a></li>
                </ul>
            </nav>
        </header>
        <h1>Perfil del usuario: <?= $_SESSION["user"] ?></h1>
        <form action="./validation/profile_pic_validation.php" enctype="multipart/form-data" method="post" id="form">
            <input type="hidden" name="max_file_size" value="">
            <label>
                Foto de perfil:
                <img src="<?= $_SESSION['foto_perfil']?>" class="profile-pic" alt="foto de perfil">
                <figcaption>
                    La imagen subida debe ser de menor a 128x128 y a 2mb
                </figcaption>
                <input id="file" type="file" name="pfp">
            </label>
            <img src="" alt="" srcset="">
            <input type="submit" id="btn" value="Cargar imagen">
        </form>
        <ul class="error">
            <?php 
            if ($_GET) {            
                if (isset($_GET["no_file"])) {
                    error_li("No seleccionaste ninguna imagen");
                }
                if (isset($_GET["alreadyExists"])) {
                    error_li("La imagen ya existe en el servidor");
                }
                if (isset($_GET["invalid_type"])) {
                    error_li("Tipo de archivo inválido: debe ser .jpg o png");
                }
                if (isset($_GET["uploadSuccess"])) {
                    error_li("Subida exitosa");
                }
            }
            ?>
        </ul>
        <section>
            <header>
                <h3>
                    Cambiar datos del perfil
                </h3>
            </header>
            <form action="./validation/profile_data_modify.php" method="post">
                <?php 
                    include("./bd/bd.php");
                    $user = $_SESSION["user"];
                    $pass = $_SESSION["pass"];
                    $query = "SELECT * FROM usuario WHERE usuario ='$user' AND pass = '$pass'";
                    $result = ($connection->query($query))->fetch_assoc();
                ?>
                <label>
                    Cambiar usuario actual: <?= $result["usuario"] ?>
                    <input type="text" name="newUser" placeholder="nuevo usuario">
                </label>
                <label>
                    Cambiar contraseña actual: <?= $result["pass"] ?>
                    <input type="text" name="newPass" placeholder="nueva contraseña">
                    Confirma nueva contraseña:
                    <input type="text" name="confirmPass" placeholder="confirma contraseña">
                </label>
                <label>
                    Cambiar email actual: <?= $result["email"] ?>
                    <input type="email" name="newEmail" placeholder="mail@ejemplo.com">
                </label>
                <input type="submit" value="Modificar">
            </form>
        </section>
        <script src="js/file_size_validation.js"></script>
    <?php include "./templates/footer.php" ?>
<?php }
    else {
        header("location: login.php?error=not_logged");
    }
?>