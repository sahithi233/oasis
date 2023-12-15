<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pass = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];

    // Validate the data (you can add more validation as needed)
    if (empty($name) || empty($email) || empty($pass) || empty($confirmPassword)) {
        echo "All fields are required.";
    } elseif ($pass != $confirmPassword) {
        echo "Password and confirm password do not match.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match('/\.com$/', $email)) {
        echo "Invalid email format. Email must be in the format user@example.com and end with '.com'.";
    } else {
        // Process the registration and save to the database

        // Database connection parameters
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "test";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Insert data into the database (replace 'your_table_name' with your actual table name)
        $sql = "INSERT INTO login (name, email, password) VALUES ('$name', '$email', '$pass')";

        if ($conn->query($sql) === TRUE) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the database connection
        $conn->close();
    }
}
?>
