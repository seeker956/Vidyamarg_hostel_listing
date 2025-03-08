<?php
session_start();

// Include database configuration
$servername = "localhost";
$username = "u406441005_pdsolution62";
$password = "o9A]Wh5zz";
$database = "u406441005_hostel";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $auser = mysqli_real_escape_string($conn, $_POST['auser']);
    $aemail = mysqli_real_escape_string($conn, $_POST['aemail']);
    $apass = password_hash($_POST['apass'], PASSWORD_DEFAULT); // Secure password hashing
    $adob = mysqli_real_escape_string($conn, $_POST['adob']);
    $aphone = mysqli_real_escape_string($conn, $_POST['aphone']);

    // Insert into database
    $sql = "INSERT INTO admin (auser, aemail, apass, adob, aphone) 
            VALUES ('$auser', '$aemail', '$apass', '$adob', '$aphone')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "Signup Successful!";
        header("Location: admin_signup.php"); // Redirect back to form page
        exit();
    } else {
        $_SESSION['message'] = "Error: " . $conn->error;
        header("Location: admin_signup.php");
        exit();
    }
}

// Close connection
$conn->close();
?>
