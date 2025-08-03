<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$database = "internship";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}

echo "✅ Connected to DB<br>";

// Confirm if form submitted
if (isset($_POST['submit'])) {
    echo "Form submitted!<br>";

    // Check what was received
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";

    // Capture form data
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $pet_type = $_POST['pet_type'];

    // Insert query
    $sql = "INSERT INTO adoptions (name, phone, email, pet_type) VALUES ('$name', '$phone', '$email', '$pet_type')";
    
    //echo "Running query: $sql <br>";

    if ($conn->query($sql) === TRUE) {
        echo "✅ New record added successfully!";
    } else {
        echo "❌ Error: " . $conn->error;
    }
} else {
    echo "Form not submitted!<br>";
}

$conn->close();
?>
