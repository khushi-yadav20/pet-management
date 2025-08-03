<!DOCTYPE html>
<html>
<head>
<style>
table {
  border-collapse: collapse;
  width: 70%;
  margin: 20px auto;
}

th, td {
  border: 1px solid #ddd;
  padding: 10px;
  text-align: left;
}

th {
  background-color: #82bbaa68;
}

h2 {
  text-align: center;
}

.action-btn {
  padding: 5px 10px;
  margin: 2px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 14px;
  transition: all 0.3s;
}

.edit-btn {
  background-color: #4CAF50;
  color: white;
}

.delete-btn {
  background-color: #f44336;
  color: white;
}

.edit-btn:hover {
  background-color: #45a049;
}

.delete-btn:hover {
  background-color: #d32f2f;
}

.actions-cell {
  text-align: center;
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
$conn->query("CREATE TABLE IF NOT EXISTS adoptions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    phone VARCHAR(15),
    email VARCHAR(50),
    pet_type VARCHAR(20),
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

$sql = "SELECT id, name, phone, email, pet_type, submitted_at FROM adoptions";
$result = $conn->query($sql);

echo "<h2>Pet Adoption Records</h2>";
echo "<table>";
echo "<tr>
        <th>ID</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Pet Type</th>
        <th>Submitted At</th>
        <th>Actions</th>
      </tr>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["phone"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["pet_type"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["submitted_at"]) . "</td>";
        echo "<td class='actions-cell'>
                <button class='action-btn edit-btn' onclick='editRecord(".$row["id"].")'>Edit</button>
                <button class='action-btn delete-btn' onclick='confirmDelete(".$row["id"].")'>Delete</button>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>No adoption records found</td></tr>";
}

echo "</table>";

$conn->close();
?>

<script>
function editRecord(id) {
    // Redirect to edit page with the record ID
    window.location.href = "edit_adoption.php?id=" + id;
}

function confirmDelete(id) {
    if (confirm("Are you sure you want to delete this adoption record?")) {
        // Send AJAX request to delete the record
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "delete_adoption.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                alert(this.responseText);
                location.reload(); // Refresh the page to show updated records
            }
        };
        xhr.send("id=" + id);
    }
}
</script>

</body>
</html>