<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello Page</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .hello-container {
            text-align: center;
            padding: 20px;
            background-color: #3498db;
            color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        h1 {
            margin: 0;
            font-size: 2em;
        }

        p {
            margin-top: 10px;
            font-size: 1.2em;
        }
    </style>
</head>
<body>
    <div class="hello-container">
        <h1>Hello!</h1>
<?php
session_start();

// Assuming your database connection is established
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

// Get the id from the session
$id = $_SESSION['id'];
// Fetch the name associated with the id from the database
$sql = "SELECT name FROM login WHERE id = '$id'";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_array($result);
    // Print the entire $row array for debugging
    

    // Check if the 'name' offset exists in the $row array
    $name = isset($row['name']) ? $row['name'] : "Unknown User";
    echo "<p>Welcome to my website, $name.</p>";
} else {
    echo "<p>User not found.</p>";
}

// Close the database connection
$conn->close();
?>

    </div>
</body>
</html>
