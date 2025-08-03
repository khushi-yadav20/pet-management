<!DOCTYPE html>
<html>
<head>
<style>
table {
  border-collapse: collapse;
  width: 90%;
  margin: 20px auto;
}

th, td {
  border: 1px solid #ddd;
  padding: 10px;
  text-align: left;
}

th {
  background-color: #ecececf7;
}

h2 {
  text-align: center;
  color: #3178c0ff;
  margin-bottom: 20px;
}

tr:nth-child(even) {
  background-color: #1fbac5ff;
}

tr:hover {
  background-color: #e7dca657;
}

.action-btn {
  padding: 5px 10px;
  margin: 0 5px;
  border: none;
  border-radius: 3px;
  cursor: pointer;
  color: white;
}

.edit-btn {
  background-color: #4CAF50;
}

.delete-btn {
  background-color: #f44336;
}

.edit-btn:hover {
  background-color: #45a049;
}

.delete-btn:hover {
  background-color: #d32f2f;
}
</style>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "internship";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$conn->query("CREATE TABLE IF NOT EXISTS pet_grooming (
    id INT AUTO_INCREMENT PRIMARY KEY,
    owner_name VARCHAR(50) NOT NULL,
    pet_name VARCHAR(50) NOT NULL,
    pet_breed VARCHAR(50) NOT NULL,
    service_type VARCHAR(50) NOT NULL,
    service_date DATE NOT NULL,
    service_time VARCHAR(20) NOT NULL,
    special_notes TEXT,
    contact_number VARCHAR(20) NOT NULL,
    submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

$sql = "SELECT id, owner_name, pet_name, pet_breed, service_type, 
               service_date, service_time, special_notes, contact_number, 
               submission_date 
        FROM pet_grooming";
$result = $conn->query($sql);

echo "<h2>Pet Grooming Service Records</h2>";
echo "<table>";
echo "<tr>
        <th>ID</th>
        <th>Owner Name</th>
        <th>Pet Name</th>
        <th>Pet Breed</th>
        <th>Service Type</th>
        <th>Service Date</th>
        <th>Service Time</th>
        <th>Special Notes</th>
        <th>Contact Number</th>
        <th>Submission Date</th>
        <th>Actions</th>
      </tr>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["owner_name"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["pet_name"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["pet_breed"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["service_type"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["service_date"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["service_time"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["special_notes"] ?? '') . "</td>";
        echo "<td>" . htmlspecialchars($row["contact_number"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["submission_date"]) . "</td>";
        echo "<td>
                <button class='action-btn edit-btn' onclick='editRecord(" . $row["id"] . ")'>Edit</button>
                <button class='action-btn delete-btn' onclick='deleteRecord(" . $row["id"] . ")'>Delete</button>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='11'>No grooming service records found</td></tr>";
}

echo "</table>";

$conn->close();
?>

<script>
function editRecord(id) {
    // You can implement the edit functionality here
    // For example, redirect to an edit page or show a modal
    alert("Edit record with ID: " + id);
    // window.location.href = "edit_record.php?id=" + id;
}

function deleteRecord(id) {
    // You can implement the delete functionality here
    if (confirm("Are you sure you want to delete this record?")) {
        alert("Delete record with ID: " + id);
        // window.location.href = "delete_record.php?id=" + id;
    }
}
</script>

</body>
</html>