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
