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
    $pet_name = $_POST['pet_name'];
    $symptoms = $_POST['symptoms'];
    $medical_history = $_POST['medical_history'];
    $owner_name = $_POST['owner_name'];
    $contact = $_POST['contact'];
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];
    $payment_status = $_POST['payment_status'];
    $submission_time = $_POST['submission_time'];

    // Insert query
    $sql = "INSERT INTO vet (pet_name, symptoms, medical_history, owner_name, contact, appointment_date, appointment_time, payment_status, submission_time) VALUES ('$pet_name', '$symptoms', '$medical_history', '$owner_name', '$contact', '$appointment_date',' $appointment_time', '$payment_status', '$submission_time')";
    
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
