<?php
include("config.php");
$msg = "";

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $query = mysqli_query($con, "SELECT * FROM users WHERE reset_token='$token'");

    if (mysqli_num_rows($query) > 0) {
        if (isset($_POST['update'])) {
            $new_password = sha1($_POST['password']);
            mysqli_query($con, "UPDATE users SET password='$new_password', reset_token=NULL WHERE reset_token='$token'");
            $msg = "<p style='color:green;'>Password updated successfully. <a href='login.php'>Login</a></p>";
        }
    } else {
        $msg = "<p style='color:red;'>Invalid or expired token!</p>";
    }
} else {
    die("Invalid request!");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>
    <h2>Set New Password</h2>
    <?php echo $msg; ?>
    <form method="post">
        <input type="password" name="password" required placeholder="Enter new password">
        <button type="submit" name="update">Update Password</button>
    </form>
</body>
</html>
