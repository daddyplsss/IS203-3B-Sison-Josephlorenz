<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Application</title>
    <style>
        body {
            background-color: rgba(173, 216, 230, 0.8);
            backdrop-filter: blur(10px);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            text-align: center;
            color: #010101;
            font-family: Arial, sans-serif;
        }
        .container {
            background: #f1f7fe;
            border-radius: 16px;
            padding: 32px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            max-width: 400px;
        }
        .title {
            font-weight: bold;
            font-size: 2rem;
            margin-bottom: 16px;
        }
        .subtitle {
            font-size: 1rem;
            color: #666;
            margin-bottom: 24px;
        }
        .btn {
            background-color: #0066ff;
            color: #fff;
            border: none;
            border-radius: 24px;
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #005ce6;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="title">Welcome to Our Application!</div>
        <div class="subtitle">Join us today to access exclusive features and connect with others.</div>
        <a href="sign.php"><button class="btn">Get Started</button></a>
        <div data-role="footer" align="center">
        <small>Programmed by: Joseph Lorenz D. Sison
      </div>
    </div>
    
</body>
</html>
