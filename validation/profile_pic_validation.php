<?php


include "../bd/bd.php";

session_start();

define('MB', 1048576);

function updatePicUrl($name)
{
    global $connection, $pass, $user;
    $location = "./img/profile_pic/$name";
    $connection->query("UPDATE usuario SET foto_perfil = '$location' WHERE usuario = '$user' AND pass = '$pass'");
    $_SESSION["foto_perfil"] = $location;
}


$user = $_SESSION["user"];
$pass = $_SESSION["pass"];

//file data
$name = $_FILES["pfp"]["name"];
$location = "../img/profile_pic/$name";


if ($_FILES["pfp"]["size"] == 0) {
    header("Location: ../profile.php?no_file");
} else {

    $extensiones = ["jpg", "png"];
    $extensionArchivo = pathinfo($name, PATHINFO_EXTENSION);

    if (
        !in_array($extensionArchivo, $extensiones)
    ) {
       header("Location: ../profile.php?invalid_type");
    } 
    else {
        if (file_exists($location)) {
            updatePicUrl($name);
            header("Location: ../profile.php?alreadyExists");
        } else {
            move_uploaded_file($_FILES["pfp"]["tmp_name"], $location);
            updatePicUrl($name);
            header("Location: ../profile.php?uploadSuccess");
        }
    }
}
