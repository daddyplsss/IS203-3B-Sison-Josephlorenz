<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: dashboard.php'); // Redirect if not logged in
    exit();
}

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

// Get the client ID from the URL
$id = $_GET['id'];

// Fetch the client's current data
$result = $conn->query("SELECT FirstName, Lastname, Haircut FROM client WHERE id = $id");
$client = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Client</title>
    <style>
        body {
            background-color: rgba(173, 216, 230, 0.8);
            backdrop-filter: blur(10px);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .form-box {
            max-width: 400px;
            background: #f1f7fe;
            border-radius: 16px;
            color: #010101;
            padding: 32px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        .form {
            display: flex;
            flex-direction: column;
            gap: 16px;
            text-align: center;
        }
        .input {
            background: none;
            border: 0;
            outline: 0;
            height: 40px;
            width: 100%;
            border-bottom: 1px solid #eee;
            font-size: .9rem;
            padding: 8px 15px;
        }
        .form button {
            background-color: #0066ff;
            color: #fff;
            border: 0;
            border-radius: 24px;
            padding: 10px 16px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color .3s ease;
        }
        .form button:hover {
            background-color: #005ce6;
        }
    </style>
</head>
<body>
    <div class="form-box">
        <h2>Edit Client Information</h2>
        <form class="form" method="POST" action="update.php">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label for="firstname">First Name:</label>
            <input type="text" id="firstname" name="firstname" class="input" value="<?php echo htmlspecialchars($client['FirstName']); ?>" required>

            <label for="lastname">Last Name:</label>
            <input type="text" id="lastname" name="lastname" class="input" value="<?php echo htmlspecialchars($client['Lastname']); ?>" required>

            <label for="haircut">Haircut:</label>
            <input type="text" id="haircut" name="haircut" class="input" value="<?php echo htmlspecialchars($client['Haircut']); ?>" required>

            <button type="submit">Update Client</button>
        </form>
        <a href="admin.php">
            <button style="margin-top: 16px; background-color: #ff4444; color: #fff;">Cancel</button>
        </a>
    </div>
</body>
</html>
