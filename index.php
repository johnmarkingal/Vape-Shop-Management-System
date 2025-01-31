<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #0f0f0f;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #1e1e1e;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .login-container:hover {
            transform: scale(1.05);
        }

        h2 {
            color: #ff007f;
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 25px;
            letter-spacing: 1px;
        }

        label {
            color: #fff;
            font-size: 16px;
            margin-bottom: 8px;
            display: block;
            text-align: left;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 14px;
            margin-bottom: 20px;
            border: none;
            border-radius: 8px;
            background-color: #333;
            color: #fff;
            font-size: 16px;
            box-sizing: border-box;
            outline: none;
            transition: 0.3s ease;
        }

        input[type="text"]:focus, input[type="password"]:focus {
            border: 2px solid #ff007f;
            box-shadow: 0 0 8px rgba(255, 0, 127, 0.8);
        }

        button {
            width: 100%;
            padding: 20px; /* Increased padding */
            background-color: #ff007f;
            color: #fff;
            font-size: 22px; /* Increased font size */
            font-weight: bold;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #e6006b;
        }

        .error {
            color: #ff007f;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .footer {
            font-size: 14px;
            color: #fff;
            margin-top: 20px;
        }

        .footer a {
            color: #00bfff;
            text-decoration: none;
            font-weight: 600;
        }

        .footer a:hover {
            color: #ff007f;
        }

    </style>
</head>
<body>

    <div class="login-container">
        <h2>Login to Vape Shop</h2>

        <!-- Error Message -->
        <?php if (isset($_GET['error'])) { ?>
            <div class="error"><?php echo $_GET['error']; ?></div>
        <?php } ?>

        <!-- Login Form -->
        <form action="login.php" method="post">
            <label for="uname">User Name</label>
            <input type="text" name="uname" id="uname" placeholder="Enter your username" required><br>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Enter your password" required><br>

            <button type="submit">Login</button>
        </form>

        <div class="footer">
            <p>Don't have an account? <a href="register.php">Sign Up</a></p>
        </div>
    </div>

</body>
</html>
