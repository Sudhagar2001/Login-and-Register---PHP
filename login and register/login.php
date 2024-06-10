<?php
include 'config.php';

$login_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Retrieve user data from the database
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User exists
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Start session
            session_start();
            // Store user data in session
            $_SESSION['email'] = $email;
            // Redirect to userdashboard.php
            header("Location: userdashboard.php");
            exit(); // Stop further execution
        } else {
            $login_error = "Invalid email or password.";
        }
    } else {
        $login_error = "Invalid email or password.";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class="container">
    <h2>Login</h2>
    <?php 
    if (!empty($login_error)) {
        echo '<div>' . $login_error . '</div>';
    }
    ?>
    <form method="post" action="login.php">
        
    <label for="email">Email:</label>
            <input type="email" name="email" required><br><br>
        
            <label for="password">Password:</label>
            <input type="password" name="password" required><br><br>
    
            <button type="submit" value="Login">Login</button>
        
            <br><br>
            <a href="register.php">  Don't have an account? Click Register<a>
        <a href="index.php">Back</a></div>
    </form>
</div>
</body>
</html>
