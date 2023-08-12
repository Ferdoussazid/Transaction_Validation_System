<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Perform your login validation here
    // Example: Check against a database of users

    if ($username === 'user1' && $password === 'password1') {
        // Successful login
        header("Location: welcome.php");
        exit();
    } elseif ($username === 'user2' && $password === 'password2') {
        // Successful login
        header("Location: welcome.php");
        exit();
    } else {
        // Invalid login
        header("Location: login.php?error=1");
        exit();
    }
}
?>
