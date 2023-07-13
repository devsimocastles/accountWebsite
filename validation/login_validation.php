<?php

session_start();

$user = $_POST["name"];
$pass = $_POST["pass"];

$_SESSION["user"] = $user;
$_SESSION["pass"] = $pass;

if ($user == "" || $pass == "") {
    header("Location: ../login.php?error=empty");
}

if (strlen($user) < 8 || strlen($pass) < 8) {
    header("Location: ../login.php?error=short_field");
}

$servername = "localhost";
$username = "root";
$bd_pass = "";
$bd = "accountwebsite";

$connection = new mysqli($servername, $username, $bd_pass, $bd);

if ($connection->connect_error) {
    header("Location: ../login.php?error=bd_connect");
} else {
    $sql = "SELECT * FROM usuario WHERE usuario = '$user' AND pass = '$pass' LIMIT 1";
    $query = $connection->query($sql);
    if ($query->num_rows == 1) {
        $_SESSION["logged"] = TRUE;
        header("Location: ../index.php");
    } 
    else {
        header("Location: ../login.php?error=user_dont_exist");
        $connection->close();
    }
}


