<?php
require('./Database.php'); // Include your database connection file

$username = 'admin';
$password = 'admin';
$hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash the password

// Insert admin account into the database
$stmt = $connection->prepare("INSERT INTO register (username, password) VALUES (?, ?)");

if ($stmt === false) {
    die("Error preparing the statement: " . $connection->error);
}

$stmt->bind_param("ss", $username, $hashedPassword); // Bind parameters
if (!$stmt->execute()) {
    die("Error executing the statement: " . $stmt->error);
}

$stmt->close();
echo "Admin account created successfully.";
?>