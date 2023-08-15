<?php

  require_once('database.php');

    session_start();
    $username = $_SESSION['username'];

    $con = dbConnection();
    $sql = "SELECT Amount FROM actors WHERE Username = '$username'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    if($count == 1) 
    {
     $row = mysqli_fetch_assoc($result);
     $balance = $row["Amount"];
    }
    else
    {
        $balance = "";
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>User Homepage</title>
    <link rel="stylesheet" href="userhomepages.css">
</head>
    
<body>
    <h2 >Welcome <?php echo $username?><br><br>Your Available Balance is  <?php echo $balance ?> TK </h2>
    <div class="user-container">
        <h1>Transaction</h1>
        <form id="transactionForm">
            <label for="to">To:</label>
            <input type="text" id="to" name="to" required>
            
            <label for="from">From:</label>
            <input type="text" id="from" name="from" required>
            
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>
            
            <label for="amount">Amount:</label>
            <input type="text" id="amount" name="amount" required>
            
            <label for="signature">Signature:</label>
            <input type="text" id="signature" name="signature" required>

            <input type="hidden" name="balance" value="<?php echo $balance; ?>">


            
            <button class="center-button">Send Transaction</button>
            
        </form>
    </div>
</body>
</html>
