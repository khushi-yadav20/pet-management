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
    $owner_name = $_POST['owner_name'];
    $pet_name = $_POST['pet_name'];
    $pet_breed = $_POST['pet_breed'];
    $service_type = $_POST['service_type'];
    $service_date = $_POST['service_date'];
    $service_time = $_POST['service_time'];
    $special_notes = $_POST['special_notes'];
    $contact_number = $_POST['contact_number'];
    $submission_date = $_POST['submission_date'];

    // Insert query
    $sql = "INSERT INTO pet_grooming (owner_name, pet_name, pet_breed, service_type, service_date, service_time, special_notes, contact_number, submission_date) VALUES ('$owner_name', '$pet_name', '$pet_breed', '$service_type', '$service_date', '$service_time',' $special_notes', '$contact_number', '$submission_date')";
    
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
