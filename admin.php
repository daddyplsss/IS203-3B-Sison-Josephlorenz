<?php
session_start();

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php'); // Redirect to login if not logged in
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

// Fetch client data
$result = $conn->query("SELECT id, FirstName, Lastname, Haircut FROM client");

if (!$result) {
    die("Query failed: " . $conn->error);
}

// Handle delete request
if (isset($_GET['delete_id'])) {
    $delete_id = (int)$_GET['delete_id']; // Ensure delete_id is an integer
    $conn->query("DELETE FROM client WHERE id='$delete_id'");
    header("Location: admin.php"); // Refresh the page after deletion
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Haircut Input</title>
    <style>
        body {
            background-color: rgba(173, 216, 230, 0.8);
            backdrop-filter: blur(10px);
            margin: 0;
            font-family: Arial, sans-serif;
            color: #010101;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            height: 100vh;
        }
        .container {
            background: #f1f7fe;
            border-radius: 16px;
            padding: 32px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            max-width: 90vw; /* Allow more width for landscape */
            overflow-x: auto; /* Allow horizontal scrolling if needed */
            text-align: center;
        }
        .title {
            font-weight: bold;
            font-size: 2rem;
            margin-bottom: 16px;
        }
        form {
            margin-bottom: 20px;
            text-align: left; /* Align labels and inputs to the left */
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input[type="text"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            background-color: #5cb85c;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
        }
        button:hover {
            background-color: #4cae4c;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .logout-btn {
            margin-top: 20px;
            background-color: #ff4c4c;
            color: #fff;
            border: none;
            border-radius: 24px;
            padding: 10px 20px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .logout-btn:hover {
            background-color: #e04040;
        }
        .delete-btn {
            background-color: #d9534f;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .delete-btn:hover {
            background-color: #c9302c;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="title">Client Haircut Input</div>

    <form id="clientForm" method="POST" action="submit.php">
        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname" required>

        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname" required>

        <label for="haircut">Haircut:</label>
        <input type="text" id="haircut" name="haircut" required>

        <button type="submit">Add Client</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Haircut</th>
                <th>Actions</th> <!-- Column for actions -->
            </tr>
        </thead>
        <tbody id="clientTableBody">
            <?php
            // Check if there are results
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . htmlspecialchars($row['FirstName']) . "</td>
                            <td>" . htmlspecialchars($row['Lastname']) . "</td>
                            <td>" . htmlspecialchars($row['Haircut']) . "</td>
                            <td>
                                <a href='edit.php?id=" . $row['id'] . "'><button>Edit</button></a>
                                <a href='admin.php?delete_id=" . $row['id'] . "' onclick='return confirm(\"Are you sure you want to delete this client?\");'>
                                    <button class='delete-btn'>Delete</button>
                                </a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No clients found.</td></tr>";
            }

            // Close the connection
            $conn->close();
            ?>
        </tbody>
    </table>

    <a href="logout.php"><button class="logout-btn">Log Out</button></a>
    <div data-role="footer" align="center">
        <small>Programmed by: Joseph Lorenz D. Sison</small>
</div>
</div>


</body>
</html>
