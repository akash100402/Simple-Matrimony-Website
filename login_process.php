<?php
// Start session
session_start();

// Include the database connection file
include 'db_connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    // Query to fetch user data based on phone number
    $sql = "SELECT * FROM users WHERE phone = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $phone, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // User found, set session parameters
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['phone'];
        $_SESSION['fullname'] = $user['fullname'];

        // Redirect to dashboard
        header("Location: dashboard.php");
        exit();
    } else {
        // Invalid credentials, redirect back to login page with error message
        header("Location: login.php?error=Invalid credentials.");
        exit();
    }
} else {
    // Redirect to login page if form is not submitted
    header("Location: login.php");
    exit();
}

// Close connection and statement
$stmt->close();
$conn->close();
