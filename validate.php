<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $conn = new mysqli("localhost", "root", "", "internship");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    // Query database
    $sql = "SELECT * FROM login_users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        
        // Verify password (assuming passwords are hashed)
        if (password_verify($password, $user['password'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $user['username'];
            header("Location: index.php");
            exit();
        } else {
            $_SESSION['login_error'] = "Invalid password";
        }
    } else {
        $_SESSION['login_error'] = "Username not found";
    }

    $conn->close();
    header("Location: login.php");
    exit();
}
?>