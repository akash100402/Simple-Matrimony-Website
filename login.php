<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #E8D62F;
            height: 100vh;
        }
        hr{
            border-color: gray;
        }
        .main{
            height: 400px;
            background-color: #5E0905;
            width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
            padding: 100px auto;
        }

        header {
            background-color: #E8D62F;
            /* Brown */
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;

        }

        a {
            text-decoration: none;
        }

        .logo img {
            width: 100px;
            height: 100px;
            margin-right: 10px;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }
        a:hover{
            text-decoration: underline;
        }

        nav ul li a {
            text-decoration: none;
            color: #5E0905;
            /* Gold */
        }

        .container-foot {
            display: flex;
            justify-content: space-between;
            text-align: center;
        }


        .community-info,
        .quick-links,
        .contact-us {
            width: 30%;
            text-align: center;
        }

        .community-info h1 {
            font-size: 24px;
            font-weight: bold;
        }

        .community-info p,
        .contact-us p {
            font-size: 14px;
        }

        .quick-links ul,
        .contact-us ul {
            list-style: none;
            padding: 0;
        }

        .quick-links li,
        .contact-us li {
            margin-bottom: 10px;
        }

        .quick-links a,
        .contact-us a {
            text-decoration: none;
            color: #5E0905;
        }

        .contact-us .icon {
            margin-right: 5px;
        }

        .container {
            width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        input[type="password"] {
            width: 94%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 14px 10px;
            background-color: brown;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #E8D62F;
            border: 2px solid black;
            color: black;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }

        .register-link {
            text-align: center;
            margin-top: 10px;
            color: #333;
        }

        .register-link a {
            color: #4CAF50;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <header>
        <div class="logo">
            <img src="Assets/24manai-logo-png.png" alt="Logo">
        </div>
        <div>
            <h1 style="text-align: center;">Matrimony Management System</h1>
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php">About Us</a></li>
                <li><a href="index.php">Contact Us</a></li>
                <li><a href="login.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <hr>
    <div class="main">
        <div class="container">
            <h2>Login</h2>
            <form action="login_process.php" method="POST">
                <label for="phone">Phone Number:</label>
                <input type="text" id="phone" name="phone" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <input type="submit" value="Login">
            </form>
            <div class="error">
                <!-- Display any login error messages here -->
                <?php
                if (isset($_GET['error'])) {
                    echo $_GET['error'];
                }
                ?>
            </div>
            <div class="register-link">
                Don't have an account? <a href="register.php">Register</a>
            </div>
        </div>
    </div>
    <hr>
    <footer>
        <div class="container-foot">
            <div class="community-info">
                <h1>24 Manai Telugu Chettiar Community</h1>
                <p>Your participation in the 24 Manai Telugu Chettiar Population Survey is a step towards a thriving future for our community.</p>
                <p>© 24 Manai Telugu Chettiar Community</p>
            </div>
            <div class="quick-links">
                <h2>Quick Links</h2>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>
            <div class="contact-us">
                <h2>Contact Us</h2>
                <ul>
                    <li>203/155 E.V.R Periyar Nedunchalai, Kilpauk, Chennai - 600010</li>
                    <li><a href="mailto:24MTC.Thalaimai.Sangam@gmail.com"><span class="icon">📧</span>24MTC.Thalaimai.Sangam@gmail.com</a></li>
                    <li><a href="tel:+919842222772"><span class="icon">📞</span>9876543210</a></li>
                </ul>
            </div>
        </div>
        <p style=" text-align: center; ">&copy; 2024 Matrimony Management System. All rights reserved.</p>
    </footer>
</body>

</html>