<?php
// Database connection settings
$servername = "localhost";
$username = "root";  // Your MySQL username
$password = "";  // Your MySQL password
$dbname = "student_db";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Variables to store form input
$firstname = $lastname = $middlename = $age = $address = $course = $section = "";

// Form submission check
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and collect form data
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $middlename = htmlspecialchars($_POST['middlename']);
    $age = (int)$_POST['age'];
    $address = htmlspecialchars($_POST['address']);
    $course = htmlspecialchars($_POST['course']);
    $section = htmlspecialchars($_POST['section']);

    // SQL query to insert data into the database
    $sql = "INSERT INTO students (firstname, lastname, middlename, age, address, course, section)
            VALUES ('$firstname', '$lastname', '$middlename', '$age', '$address', '$course', '$section')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information Form</title>
</head>
<body>
    <h1>Student Information Form</h1>
    <form method="POST" action="">
        <label for="firstname">First Name:</label><br>
        <input type="text" id="firstname" name="firstname" required><br><br>

        <label for="lastname">Last Name:</label><br>
        <input type="text" id="lastname" name="lastname" required><br><br>

        <label for="middlename">Middle Name:</label><br>
        <input type="text" id="middlename" name="middlename"><br><br>

        <label for="age">Age:</label><br>
        <input type="number" id="age" name="age" required><br><br>

        <label for="address">Address:</label><br>
        <textarea id="address" name="address" required></textarea><br><br>

        <label for="course">Course:</label><br>
        <input type="text" id="course" name="course" required><br><br>

        <label for="section">Section:</label><br>
        <input type="text" id="section" name="section" required><br><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
