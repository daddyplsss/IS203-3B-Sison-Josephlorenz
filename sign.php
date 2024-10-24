<?php
// Database configuration
$host = 'localhost'; // Database host
$database = 'db1'; // Database name
$user = 'root'; // Default username for XAMPP
$password = ''; // Default password for XAMPP (usually empty)

// Create a connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input values and sanitize
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password for security

    // Insert into database
    $sql = "INSERT INTO register (username, email, password) VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to login page on successful registration
        header('Location: login.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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
        .subtitle {
            font-size: 1rem;
            color: #666;
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
        .password-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .toggle-checkbox {
            margin-left: 10px;
        }
    </style>
    <script>
        function togglePasswordVisibility(checkbox) {
            const passwordInput = document.querySelector('input[name="password"]');
            passwordInput.type = checkbox.checked ? 'text' : 'password';
        }
    </script>
</head>
<body>
    <center>
        <div class="form-box">
            <form class="form" method="POST" action="">
                <span class="title">Sign up</span>
                <span class="subtitle">Create a free account with your email.</span>
                <div class="form-container">
                    <input type="text" class="input" name="username" placeholder="Username" required>
                    <input type="email" class="input" name="email" placeholder="Email" required>
                    <div class="password-container">
                        <input type="password" class="input" name="password" placeholder="Password" required>
                        <label>
                            <input type="checkbox" class="toggle-checkbox" onchange="togglePasswordVisibility(this)"> Show
                        </label>
                    </div>
                </div>
                <button type="submit">Sign up</button>
            </form>
            <div class="form-section">
                <p>Have an account? <a href="login.php">Log in</a></p>
            </div>
            <div data-role="footer" align="center">
        <small>Programmed by: Joseph Lorenz D. Sison
      </div>
        </div>
    </center>

</body>
</html>
