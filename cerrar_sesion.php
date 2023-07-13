<?php

session_start();
$_SESSION["logged"] = FALSE;
session_destroy();
header("Location: login.php?sesionCerrada");