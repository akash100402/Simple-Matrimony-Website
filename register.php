<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #E8D62F;

            margin: 0;
            padding: 0;
        }
        hr{
            border-color: #5E0905;
        }

        .header {
            width: 100%;
            height: 100px;
            background-color: brown;
            color: white;
            display: flex;
            justify-content: space-around;
            align-items: center;

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



        h2 {
            text-align: center;
            color: #5E0905;
            text-transform: uppercase;
            font-size: 28px;
        }

        form {
            max-width: 500px;
            margin: 20px auto;
            background-color: #fff;
            padding: 30px 50px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 20px;
        }

        select {
            width: calc(100%);
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            height: 50px;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"],
        input[type="password"],
        input[type="file"],
        input[type="number"] {
            width: calc(100% - 12px);
            height: 30px;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #5E0905;
            color: white;
            padding: 20px 0;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #E8D62F;
            border: 2px solid black;
            color: black;
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
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>
    <hr>
    <form action="register_process.php" method="POST" enctype="multipart/form-data">
        <h2>Matrimony Register</h2>
        <label for="fullname">Full Name:</label>
        <input type="text" id="fullname" name="fullname" required>

        <label>Gender:</label>
        <div class="wrap" style="display: flex; justify-content:space-around;width:40%; margin-bottom: 30px; ">

            <input type="radio" id="male" name="gender" value="male" required>
            <label for="male">Male</label>


            <input type="radio" id="female" name="gender" value="female" required>
            <label for="female">Female</label>

        </div>


       
        <label for="dateofbirth">Date of Birth:</label>
        <input type="date" id="dateofbirth" name="dateofbirth" onchange="validateDOB()" required>
        <span id="ageError" style="color: red; display: none; font-size:smaller; margin-bottom:20px">You must be at least 21 years old.</span>

        <label for="fathersname">Father's Name:</label>
        <input type="text" id="fathersname" name="fathersname" required>

        <label for="mothersname">Mother's Name:</label>
        <input type="text" id="mothersname" name="mothersname" required>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="location">Location:</label>
        <input type="text" id="location" name="location" required>


        <label for="education">Education:</label>
        <select id="education" name="education" required>
            <option value="">Select Education</option>
            <option value="SSLC">SSLC</option>
            <option value="Higher Secondary">Higher Secondary</option>
            <option value="Diploma">Diploma</option>
            <option value="Bachelors">Bachelors</option>
            <option value="Masters">Masters</option>
            <option value="Doctorates">Doctorates</option>
        </select>

        <label>Employment Status:</label>
        <div class="wrap" style="display: flex; justify-content:space-around; width:56%; margin-bottom: 30px; ">
            <input type="radio" id="employed" name="employmentstatus" value="employed" required>
            <label for="employed">Employed</label>
            <input type="radio" id="unemployed" name="employmentstatus" value="unemployed" required>
            <label for="unemployed">Unemployed</label>
        </div>

        <label for="occupation">Occupation:</label>
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

        <label for="income">Income:</label>
        <input type="text" id="income" name="income">

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="photo">Photo:</label>
        <input type="file" id="photo" name="photo" accept="image/*" required>



        <input type="submit" value="Register">
    </form>
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

    <script>
        function validateDOB() {
            var dobInput = document.getElementById("dateofbirth").value;
            var dob = new Date(dobInput);
            var today = new Date();
            var age = today.getFullYear() - dob.getFullYear();
            var monthDiff = today.getMonth() - dob.getMonth();
            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
                age--;
            }
            if (age < 21) {
                document.getElementById("ageError").style.display = "block";
            } else {
                document.getElementById("ageError").style.display = "none";
            }
            console.log(age);
        }
    </script>
</body>

</html>