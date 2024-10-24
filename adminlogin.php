<?php
// Start the session
session_start();

// Database configuration
$host = 'localhost';
$database = 'db1';
$user = 'root';
$password = '';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    $sql = "SELECT password FROM register WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Successful login
            $_SESSION['username'] = $username; // Store username or some identifier
            header('Location: admin.php');
            exit();
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "Username not found.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            background-color: rgba(173, 216, 230, 0.8);
            backdrop-filter: blur(10px);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }
        .form-box {
            max-width: 300px;
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
        .title {
            font-weight: bold;
            font-size: 1.6rem;
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
        .form-section {
            padding: 16px;
            font-size: .85rem;
            background-color: #e0ecfb;
            box-shadow: rgb(0 0 0 / 8%) 0 -1px;
        }
        .form-section a {
            font-weight: bold;
            color: #0066ff;
            transition: color .3s ease;
        }
        .form-section a:hover {
            color: #005ce6;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <center>
        <div class="form-box">
            <form class="form" method="POST" action="adminlogin.php">
                <span class="title">Admin Log In</span>
                <div class="form-container">
                    <input type="text" class="input" name="username" placeholder="Username" required>
                    <input type="password" class="input" name="password" placeholder="Password" required>
                </div>
                <button type="submit">Log In</button>
                <?php if (!empty($error)): ?>
                    <p style="color:red;"><?php echo $error; ?></p>
                <?php endif; ?>
            </form>
            <div data-role="footer" align="center">
                <small>Programmed by: Joseph Lorenz D. Sison</small>
            </div>
        </div>
    </center>
</body>
</html>
