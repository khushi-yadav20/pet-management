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
    $type = $_POST['type'];
    $pet_name = $_POST['pet_name'];
    $breed = $_POST['breed'];
    $color = $_POST['color'];
    $Location = $_POST['Location'];
    $contact = $_POST['contact'];
    $date_added = $_POST['date_added'];
    

    // Insert query
    $sql = "INSERT INTO lost_found_pets (type, pet_name, breed, color, Location, contact, date_added) VALUES ('$type', '$pet_name', '$breed', '$color', '$Location', '$contact',' $date_added' )";
    
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
