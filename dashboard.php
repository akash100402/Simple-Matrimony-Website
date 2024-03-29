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
$sql = "SELECT gender FROM users WHERE phone = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

// Determine the gender filter
$gender_filter = ($user['gender'] == 'male') ? 'female' : 'male';

// Retrieve users based on the gender filter, excluding the logged-in user
$sql_users = "SELECT *, TIMESTAMPDIFF(YEAR, dateofbirth, CURDATE()) AS age FROM users WHERE gender = ? AND phone != ?";
$stmt_users = $conn->prepare($sql_users);
$stmt_users->bind_param("ss", $gender_filter, $user_id);
$stmt_users->execute();
$result_users = $stmt_users->get_result();

// Close statement
$stmt_users->close();

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>

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
                <li><a href="index.php">About Us</a></li>
                <li><a href="index.php">Contact Us</a></li>
                <li><a href="login.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <div class="filter">
        <select id="education" name="education" required>
            <option value="">Select Education</option>
            <option value="SSLC">SSLC</option>
            <option value="Higher Secondary">Higher Secondary</option>
            <option value="Diploma">Diploma</option>
            <option value="Bachelors">Bachelors</option>
            <option value="Masters">Masters</option>
            <option value="Doctorates">Doctorates</option>
        </select>

        <select id="occupation" name="occupation" required>
            <option value="">Select Occupation</option>
            <option value="Business Owner">Business Owner</option>
            <option value="Engineer">Engineer</option>
            <option value="Doctor">Doctor</option>
            <option value="Teacher">Teacher</option>
            <option value="Lawyer">Lawyer</option>
            <option value="Accountant">Accountant</option>
            <option value="Software Developer">Software Developer</option>
            <option value="Chef">Chef</option>
            <option value="Marketing Manager">Marketing Manager</option>
            <option value="Police Officer">Police Officer</option>
        </select>

        <select id="occupation" name="occupation" required>
            <option value="">Select Age Range</option>
            <option value="21-30">21 - 30 Years Old</option>
            <option value="31-40">31 - 40 Years Old</option>
            <option value="40-above">Above 40 Years</option>

        </select>

    </div>
    <div id="apply-filter"> <input type="submit" id="apply" value="Apply Filter">
    </div>
    <div class="container-1">
        <h2>ALL ALLIANCE</h2>

        <div class="profile-button">
            <a href="profile.php"><button id="find">👤 Profile</button></a>
        </div>
        <div class="user-grid">
            <?php while ($row = $result_users->fetch_assoc()) : ?>
                <div class="user-card" onclick="viewUserDetails('<?php echo $row['phone']; ?>')">
                    <div class="user-photo">
                        <img src="<?php echo $row['photo_path']; ?>" alt="User Photo">
                    </div>
                    <div class="user-details">
                        <p><strong>Name:</strong> <?php echo $row['fullname']; ?></p>
                        <p><strong>Phone:</strong> <?php echo $row['phone']; ?></p>
                        <p><strong>Age:</strong> <?php echo $row['age']; ?></p>
                    </div>
                </div>
            <?php endwhile; ?>
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

    <script>
        // Function to view user details
        function viewUserDetails(phone) {
            // Redirect to user_detail.php with the user phone number as query parameter
            window.location.href = "user_detail.php?phone=" + phone;
        }
    </script>
</body>

</html>