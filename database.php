<?php

function dbConnection(){

    $conn = mysqli_connect('localhost', 'root', '', 'tvs');
    return $conn;
    
}

?>