<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: dashboard.php'); // Redirect if not logged in
    exit();
}

// Sample haircut designs
$haircut_designs = [
    "Buzz Cut",
    "Undercut",
    "Fade",
    "Pompadour",
    "Crew Cut",
    "Long Layers",
    "French Crop",
    "Textured Crop"
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Haircut Designs</title>
    <style>
        body {
            background-color: rgba(173, 216, 230, 0.8);
            backdrop-filter: blur(10px);
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 0;
            font-family: Arial, sans-serif;
            color: #010101;
        }
        .container {
            background: #f1f7fe;
            border-radius: 16px;
            padding: 32px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            max-width: 600px;
            text-align: center;
        }
        .title {
            font-weight: bold;
            font-size: 2rem;
            margin-bottom: 16px;
        }
        .design-list {
            list-style-type: none;
            padding: 0;
        }
        .design-item {
            background: #e0ecfb;
            margin: 10px 0;
            padding: 10px;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }
        .design-item:hover {
            background-color: #d0e0f0;
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
    </style>
</head>
<body>
    <div class="container">
        <div class="title">Welcome!</div>
        <h2>Available Haircut Designs</h2>
        <ul class="design-list">
            <?php foreach ($haircut_designs as $design): ?>
                <li class="design-item"><?php echo htmlspecialchars($design); ?></li>
            <?php endforeach; ?>
        </ul>
        <a href="logout.php"><a href="home.php"><button class="logout-btn">Log Out</button></a>
        <div data-role="footer" align="center">
        <small>Programmed by: Joseph Lorenz D. Sison
      </div>
    </div>
    
</body>
</html>
