<?php 
require_once('actors-model.php');
 
session_start();
 
$username = $_SESSION['username'];
 $password = $_SESSION['password'];
 $status = login($username, $password);
 if($status!=false){ if($status['Role'] == "User") { header('location: userhomepage.php');
} else if($status['Role'] == "Admin") { setcookie("id", $status['ID'], time()+99999999999, "/");
 header('location: adminhomepage.php');
 }  else{ echo "Could not sign-in. Invalid login credentials.";
 }} ?>