<?php
// Start session
session_start();

// Check if user is logged in, if not, redirect to login page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Include the database connection file
include 'db_connection.php';

// Retrieve user details based on session user_id
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE phone = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Close statement
$stmt->close();

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="styles.css">
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
                <li><a href="#about">About Us</a></li>
                <li><a href="#contact">Contact Us</a></li>
                <li><a href="log_reg.php">Login</a></li>
            </ul>
        </nav>
    </header>
    <hr>
    <div class="container-profile">
        <h2>MY PROFILE</h2>
        <div class="profile-photo">
            <img src="<?php echo $user['photo_path']; ?>" alt="User Photo">
        </div>
        <div class="profile-details">
            <p><strong>Full Name:</strong> <?php echo $user['fullname']; ?></p>
            <p><strong>Gender:</strong> <?php echo $user['gender']; ?></p>
            <p><strong>Date of Birth:</strong> <?php echo $user['dateofbirth']; ?></p>
            <p><strong>Father's Name:</strong> <?php echo $user['fathersname']; ?></p>
            <p><strong>Mother's Name:</strong> <?php echo $user['mothersname']; ?></p>
            <p><strong>Phone:</strong> <?php echo $user['phone']; ?></p>
            <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
            <p><strong>Location:</strong> <?php echo $user['location']; ?></p>
            <p><strong>Education:</strong> <?php echo $user['education']; ?></p>
            <p><strong>Employment Status:</strong> <?php echo $user['employmentstatus']; ?></p>
            <p><strong>Occupation:</strong> <?php echo $user['occupation']; ?></p>
            <p><strong>Income:</strong> <?php echo $user['income']; ?></p>
        </div>
    </div>
    <hr>
    <footer>
        <div class="container">
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
        <p>&copy; 2024 Matrimony Management System. All rights reserved.</p>
    </footer>
</body>

</html>