<?php
// This code ensures that only logged-in users can access the dashboard
// If the user is not logged in, they will be redirected to the login page

session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

// Display user information
$user_email = $_SESSION['email']; // Assuming you store the email in the session after login
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
<style>
   
button {
    width: 5%;
    height: 50px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    float:right;
    margin-top:-90px;
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
}
</style>
</head>
<body>
    <p>Hello, <?php echo $user_email; ?>!</p>
    <p>Welcome</p>
<a href="logout.php">Logout</a>
</body>
</html>
