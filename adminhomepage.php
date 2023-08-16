
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminhomepages.css">
    <title>Admin Home</title>
</head>
<body>
<table id="loginPanel" cellspacing="25">
        <tr align="center">
            <td colspan="6">
                <font size="6", >Pending Transactions</font><br><br>
            </td>
        </tr>
        <tr>
            <th>From</th>
            <th>To</th>
            <th>Amount</th>
            <th>Date</th>
            <th>Approved Votes</th>
            <th>Action</th>
        </tr>
        <tr></tr>
<?php

$id = $_COOKIE['id'];

$currentData = file_get_contents('json/pending.json');
$arrayData = json_decode($currentData, true);

if($id == 3) $currentData2 = file_get_contents('json/sazid_validlist.json');
else if($id == 4) $currentData2 = file_get_contents('json/rian_validlist.json');
else if($id == 5) $currentData2 = file_get_contents('json/tamal_validlist.json');
$arrayData2 = json_decode($currentData2, true);

if($arrayData == null){

    ?><tr><td colspan="6">There is no transaction to show</td></tr> <?php
}

else{
    foreach($arrayData as $row){
        $flag = false;
        if($arrayData2 == null) {}
        else{
        foreach($arrayData2 as $row2){
            if($arrayData2 == null) {}
            else{
            if($row["ID"]==$row2["ID"]) $flag = true;
            }
        }
        }
        if($flag == true) continue;
        else{
            
            echo "<tr>";
            echo "<td>" . $row["From"] . "</td>";
            echo "<td>" . $row["To"] . "</td>";
            echo "<td>" . $row["Amount"] . "</td>"; 
            echo "<td>" . $row["Date"] . "</td>";   
            echo "<td>" . $row["Approved Votes"]. "</td>";  ?>
            <td> <a href="decision-controller.php?id=<?php echo $row["ID"]; ?>"><button class="btn">Approve</button></a></td>
            <?php
            echo "</tr>";
            
        }
    }
};

?>
        
</table>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<table id="loginPanel" cellspacing="50">
        <tr>
            <td colspan="5">
                <font size="6">Valid Transactions</font><br><br>
            </td>
        </tr>
        <tr>
            <th>From</th>
            <th>To</th>
            <th>Amount</th>
            <th>Date</th>
            <th>Approved Votes</th>
        </tr>
        <?php

            $id = $_COOKIE['id'];

            if($id == 3) $currentData = file_get_contents('json/sazid_validlist.json');
            else if($id == 4) $currentData = file_get_contents('json/rian_validlist.json');
            else if($id == 5) $currentData = file_get_contents('json/tamal_validlist.json');
            $arrayData = json_decode($currentData, true);

            if($arrayData == null) {

                ?> <tr><td colspan="6">No valid transactions available</td></tr><?php

            }
            

        ?>
        
        
</table>
</body>
</html>