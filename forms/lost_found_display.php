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
  padding: 6px 12px;
  margin: 0 3px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  color: white;
  font-size: 13px;
  transition: background-color 0.3s;
}

.edit-btn {
  background-color: #2196F3;
}

.delete-btn {
  background-color: #f44336;
}

.edit-btn:hover {
  background-color: #0b7dda;
}

.delete-btn:hover {
  background-color: #da190b;
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

// Create table if not exists with lost/found pet structure
$create_table = $conn->query("CREATE TABLE IF NOT EXISTS lost_found_pets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(10),
    pet_name VARCHAR(50),
    breed VARCHAR(50),
    color VARCHAR(50),
    location VARCHAR(100),
    contact VARCHAR(50),
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

if (!$create_table) {
    die("<div class='error'>Error creating table: " . $conn->error . "</div>");
}

$sql = "SELECT id, type, pet_name, breed, color, location, contact, date_added 
        FROM lost_found_pets";
$result = $conn->query($sql);

if ($result === false) {
    die("<div class='error'>Error executing query: " . $conn->error . "</div>");
}

echo "<h2>Lost & Found Pet Records</h2>";
echo "<table>";
echo "<tr>
        <th>ID</th>
        <th>Type</th>
        <th>Pet Name</th>
        <th>Breed</th>
        <th>Color</th>
        <th>Location</th>
        <th>Contact</th>
        <th>Date Added</th>
        <th>Actions</th>
      </tr>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["type"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["pet_name"] ?? 'Unknown') . "</td>";
        echo "<td>" . htmlspecialchars($row["breed"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["color"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["location"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["contact"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["date_added"]) . "</td>";
        echo "<td class='action-btns'>
                <button class='action-btn edit-btn' onclick='editRecord(" . $row["id"] . ")'>
                    Edit
                </button>
                <button class='action-btn delete-btn' onclick='confirmDelete(" . $row["id"] . ")'>
                    Delete
                </button>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='9'>No lost/found pet records found</td></tr>";
}

echo "</table>";

$conn->close();
?>

<script>
function editRecord(id) {
    // Redirect to edit page with the record ID
    window.location.href = "edit_lost_found.php?id=" + id;
}

function confirmDelete(id) {
    if (confirm("Are you sure you want to permanently delete this pet record?")) {
        deleteRecord(id);
    }
}

function deleteRecord(id) {
    // Using fetch API to send delete request
    fetch('delete_lost_found.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'id=' + id
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.text();
    })
    .then(data => {
        alert(data); // Show success message
        location.reload(); // Refresh the page to show updated records
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error deleting record: ' + error.message);
    });
}
</script>

</body>
</html>