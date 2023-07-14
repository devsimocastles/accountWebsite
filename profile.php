<?php
    include "./functions/error_li.php";

    session_start();
    if (isset($_SESSION) && $_SESSION["logged"] == TRUE) {
?>
    <?php include "./templates/header.php" ?>
        <h1>Perfil del usuario: <?= $_SESSION["user"] ?></h1>
        <form action="./validation/profile_validation.php" enctype="multipart/form-data" method="post">
            <label>
                Foto de perfil:
                <img src="<?= $_SESSION['foto_perfil']?>" class="profile-pic" alt="foto de perfil">
                <figcaption>
                    La imagen subida debe ser de menor a 128x128 y a 2mb
                </figcaption>
                <input type="file" name="pfp">
            </label>
            <img src="" alt="" srcset="">
            <input type="submit" value="Cargar imagen">
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
                if (isset($_GET["bigFile"])) {
                    error_li("El archivo es mayor a 2mb");
                }
                if (isset($_GET["uploadSuccess"])) {
                    error_li("Subida exitosa");
                }
            }
            ?>
        </ul>
    <?php include "./templates/footer.php" ?>
<?php }
    else {
        header("location: login.php?error=not_logged");
    }
?>