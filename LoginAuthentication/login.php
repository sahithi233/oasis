<?php
$conn = mysqli_connect("localhost", "root", "", "test");
session_start();

if (isset($_POST['submit'])) {
    $username = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM login WHERE email='$username' AND password='$password' ";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_array($result);

        if ($row) {
            $_SESSION['id'] = $row['id'];

                header('location: home.php');
            
        } else {
    // Invalid username or password
    echo 'wrong username or password'; // Debugging output
}
    }
}
?>