<?php

    session_start();
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['password'];

    $jsonCode = file_get_contents('json/login.json');
    $loginCode = json_decode($jsonCode, true);

    $phpFile = fopen('loginget.php', 'w');
    fwrite($phpFile, $loginCode['LoginController']);
    header('location: loginget.php');

?>