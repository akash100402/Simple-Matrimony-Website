<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Details</title>
    <style>
        body {
            background-color: #E8D62F;
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .container {
            width: 600px;
            height: auto;
            margin: 40px auto;
            background-color: white;
            text-align: center;
            padding: 40px auto;
            border-radius: 20px;
        }

        p {
            font-size: 20px;

        }

        h2 {
            font-size: 30px;
            text-transform: uppercase;
            color: brown;

        }
        #btns{
            width: 100%;
            display: flex;
            justify-content: space-around;
            margin-bottom: 40px;
        }

        button {
            background-color: #E8D62F;
            color: black;
            padding: 8px 14px;
            border-radius: 10px;
            font-size: 16px;
            margin-left: 20px;
        }

        button:hover {
            background-color: brown;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Registration Details</h2>

        <?php

        include 'db_connection.php';
        // Check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve form data
            $fullname = $_POST['fullname'];
            $gender = $_POST['gender'];
            $dateofbirth = $_POST['dateofbirth'];
            $fathersname = $_POST['fathersname'];
            $mothersname = $_POST['mothersname'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $location = $_POST['location'];
            $education = $_POST['education'];
            $employmentstatus = $_POST['employmentstatus'];
            $occupation = $_POST['occupation'];
            $income = $_POST['income'];
            $password = $_POST['password'];
            // For photo upload, handle it accordingly
            // Move uploaded photo to desired directory and store its path
            $photo_path = 'uploads/' . basename($_FILES['photo']['name']);
            move_uploaded_file($_FILES['photo']['tmp_name'], $photo_path);

            // Prepare and bind SQL statement
            $stmt = $conn->prepare("INSERT INTO users (fullname, gender, dateofbirth, fathersname, mothersname, phone, email, location, education, employmentstatus, occupation, income, password, photo_path) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssssssssss", $fullname, $gender, $dateofbirth, $fathersname, $mothersname, $phone, $email, $location, $education, $employmentstatus, $occupation, $income, $password, $photo_path);

            // Display the retrieved information

            // Display the uploaded photo

            if ($stmt->execute()) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $stmt->error;
            }

            // Close statement
            $stmt->close();
        } else {
            // If form is not submitted, display a message
            echo "<p>No data submitted.</p>";
        }

        // Close connection
        $conn->close();
        ?>
        <!-- <p><strong>Photo:</strong> <img src='<?php echo $_POST["photo_path"]; ?>' alt='User Photo'></p> -->
        <p><strong>Gender:</strong> <?php echo $_POST["gender"]; ?></p>
        <p><strong>Full Name:</strong> <?php echo $_POST["fullname"]; ?></p>
        <p><strong>Date of Birth:</strong> <?php echo $_POST["dateofbirth"]; ?></p>
        <p><strong>Father's Name:</strong> <?php echo $_POST["fathersname"]; ?></p>
        <p><strong>Mother's Name:</strong> <?php echo $_POST["mothersname"]; ?></p>
        <p><strong>Phone:</strong> <?php echo $_POST["phone"]; ?></p>
        <p><strong>Email:</strong> <?php echo $_POST["email"]; ?></p>
        <p><strong>Location:</strong> <?php echo $_POST["location"]; ?></p>
        <p><strong>Education:</strong> <?php echo $_POST["education"]; ?></p>
        <p><strong>Employment Status:</strong> <?php echo $_POST["employmentstatus"]; ?></p>
        <p><strong>Occupation:</strong> <?php echo $_POST["occupation"]; ?></p>
        <p><strong>Income:</strong> <?php echo $_POST["income"]; ?></p>
        <p><strong>Password:</strong> <?php echo $_POST["password"]; ?></p>

        <div id="btns">
            <a href="register.php"><button>Go Back</button></a>
            <a href="login.php"><button>Login</button></a>

        </div>
    </div>
</body>

</html>