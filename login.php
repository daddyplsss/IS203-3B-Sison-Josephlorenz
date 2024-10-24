<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            <form class="form" method="POST" action="dashboard.php">
                <span class="title">Log In</span>
                <div class="form-container">
                    <input type="text" class="input" name="username" placeholder="Username" required>
                    <input type="password" class="input" name="password" placeholder="Password" required>
                </div>
                <button type="submit">Log In</button>
                <?php if (isset($error)): ?>
                    <p style="color:red;"><?php echo $error; ?></p>
                <?php endif; ?>
            </form>
            <div class="form-section">
                <p>Don't have an account? <a href="sign.php">Sign up</a></p>
                <p>Admin? <a href="adminlogin.php">Login</a></p> 
            </div>
            <div data-role="footer" align="center">
        <small>Programmed by: Joseph Lorenz D. Sison
      </div>
        </div>
    </center>
</body>
</html>
