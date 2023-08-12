<?php
// Replace this with your database connection and validation logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $userType = $_POST["user-type"];
    
    // Sample validation (replace with actual database query)
    if ($username == "admin" && $password == "admin" && $userType == "admin") {
        header("Location: admin_dashboard.php");
        exit;
    } elseif ($username == "user" && $password == "user" && $userType == "user") {
        header("Location: user_dashboard.php");
        exit;
    } else {
        $error_message = "Invalid username, password, or user type.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Validation</title>
</head>
<body>
    <?php if (isset($error_message)) { ?>
        <p><?php echo $error_message; ?></p>
    <?php } ?>
</body>
</html>
