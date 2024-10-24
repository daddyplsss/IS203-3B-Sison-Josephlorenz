<?php
// Database credentials
$servername = "localhost";
$username = "root"; // Change to your database username
$password = ""; // Change to your database password
$dbname = "db1"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$id = $_POST['id'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$haircut = $_POST['haircut'];

// Prepare and bind
$stmt = $conn->prepare("UPDATE client SET FirstName=?, Lastname=?, Haircut=? WHERE id=?");
$stmt->bind_param("sssi", $firstname, $lastname, $haircut, $id);

// Execute the statement
if ($stmt->execute()) {
    echo "Client updated successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();

// Redirect back to admin.php
header("Location: admin.php");
exit();
?>
