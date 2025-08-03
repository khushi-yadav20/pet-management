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

.error {
  color: red;
  text-align: center;
  margin: 20px;
}

.action-btn {
  padding: 10px 10px;
  margin: 0 5px;
  border: none;
  border-radius: 3px;
  cursor: pointer;
  color: white;
  font-size: 14px;
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

.action-btns {
  display: flex;
  justify-content: center;
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
    die("<div class='error'>Connection failed: " . $conn->connect_error . "</div>");
}

// Create table if not exists with updated structure
$create_table = $conn->query("CREATE TABLE IF NOT EXISTS vet (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pet_name VARCHAR(50) NOT NULL,
    symptoms TEXT NOT NULL,
    medical_history TEXT,
    owner_name VARCHAR(50) NOT NULL,
    contact VARCHAR(20) NOT NULL,
    appointment_date DATE NOT NULL,
    appointment_time VARCHAR(20) NOT NULL,
    payment_status VARCHAR(20) DEFAULT 'Pending',
    submission_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

if (!$create_table) {
    die("<div class='error'>Error creating table: " . $conn->error . "</div>");
}

$sql = "SELECT id, pet_name, symptoms, medical_history, owner_name, 
               contact, appointment_date, appointment_time, payment_status, 
               submission_time 
        FROM vet";
$result = $conn->query($sql);

if ($result === false) {
    die("<div class='error'>Error executing query: " . $conn->error . "</div>");
}

echo "<h2>Veterinary Teleconsultation Records</h2>";
echo "<table>";
echo "<tr>
        <th>ID</th>
        <th>Pet Name</th>
        <th>Symptoms</th>
        <th>Medical History</th>
        <th>Owner Name</th>
        <th>Contact</th>
        <th>Appointment Date</th>
        <th>Appointment Time</th>
        <th>Payment Status</th>
        <th>Submission Time</th>
        <th>Actions</th>
      </tr>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["pet_name"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["symptoms"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["medical_history"] ?? 'N/A') . "</td>";
        echo "<td>" . htmlspecialchars($row["owner_name"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["contact"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["appointment_date"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["appointment_time"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["payment_status"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["submission_time"]) . "</td>";
        echo "<td class='action-btns'>
                <button class='action-btn edit-btn' onclick='editRecord(" . $row["id"] . ")'>Edit</button>
                <button class='action-btn delete-btn' onclick='confirmDelete(" . $row["id"] . ")'>Delete</button>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='11'>No teleconsultation records found</td></tr>";
}

echo "</table>";

$conn->close();
?>

<script>
function editRecord(id) {
    // Redirect to edit page with the record ID
    window.location.href = "edit_record.php?id=" + id;
}

function confirmDelete(id) {
    if (confirm("Are you sure you want to delete this record? This action cannot be undone.")) {
        deleteRecord(id);
    }
}

function deleteRecord(id) {
    // Using fetch API to send delete request
    fetch('delete_record.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'id=' + id
    })
    .then(response => response.text())
    .then(data => {
        alert(data); // Show success/error message
        location.reload(); // Refresh the page
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while deleting the record');
    });
}
</script>

</body>
</html>