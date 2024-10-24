<?php
// Database credentials
$servername = "localhost"; // Change if your server is different
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "db1"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname']; // Capture Lastname from the form
$haircut = $_POST['haircut'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO client (FirstName, Lastname, Haircut) VALUES (?, ?, ?)");
if ($stmt === false) {
    die("Prepare failed: " . $conn->error); // Output the specific error
}

// Bind parameters
$stmt->bind_param("sss", $firstname, $lastname, $haircut); // Binding three string parameters

// Execute the statement
if ($stmt->execute()) {
    // Redirect back to the admin page after successful insertion
    header("Location: admin.php");
    exit();
} else {
    echo "Error: " . $stmt->error; // Output execution error
}

// Close connections
$stmt->close();
$conn->close();
?>
