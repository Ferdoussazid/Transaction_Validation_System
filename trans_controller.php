<?php
    require_once('database.php');

    session_start();
    $username = $_SESSION['username'];

    $currentData = file_get_contents('json/pending.json');
    $array = json_decode($currentData, true);

    $id = random_int(00000000, 99999999);
    $to = $_POST["to"];
    $from = $_POST["from"];
    $amount = $_POST["amount"];
    $signature = $_POST["signature"];
    $balance = $_POST["balance"];


    $CurrentBalance = $balance - $amount;
    
    $con = dbConnection();
    $sql = "UPDATE actors SET Amount = '$CurrentBalance' WHERE Username = '$username'";
    $result = mysqli_query($con, $sql);

    $getdata = array(

        'ID' => $id,
        'To' => $to,
        'From' => $from,
        'Date' => date("d-m-Y"),
        'Amount' => $amount,
        'Signature' => $signature,
        'Approved Votes' => 0

    );

    $array [] = $getdata;

    $json = json_encode($array, JSON_PRETTY_PRINT);


    if(file_put_contents('json/pending.json', $json)) 
    {
        echo "Transaction Successful."; 
        echo "\nYour current balance is: " .$CurrentBalance; 
        echo "\nPlease wait until approved...";
        header("Refresh: 3; url=userhomepage.php");
        exit;    
    }
    else
    {
        echo "Information Couldn't be stored.";
        header("Refresh: 3; url=userhomepage.php");
        exit;
    }

?>