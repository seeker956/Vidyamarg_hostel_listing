<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';  // Include PHPMailer (if using Composer)

include("config.php");
$msg = "";

if (isset($_POST['reset'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $query = mysqli_query($con, "SELECT * FROM users WHERE email='$email'");

    if (mysqli_num_rows($query) > 0) {
        $token = sha1(uniqid()); // Generate a unique token
        mysqli_query($con, "UPDATE users SET reset_token='$token' WHERE email='$email'");

        $resetLink = "http://yourwebsite.com/password_reset.php?token=$token"; // Change to your site URL

        // **Send Email using PHPMailer**
        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';  // SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'your-email@gmail.com'; // Your email
            $mail->Password = 'your-email-password'; // Your email app password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Recipients
            $mail->setFrom('your-email@gmail.com', 'Your Website');
            $mail->addAddress($email);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset Request';
            $mail->Body = "Click the link below to reset your password:<br><a href='$resetLink'>$resetLink</a>";

            $mail->send();
            $msg = "<p style='color:green;'>Reset link sent to your email.</p>";
        } catch (Exception $e) {
            $msg = "<p style='color:red;'>Mail error: {$mail->ErrorInfo}</p>";
        }
    } else {
        $msg = "<p style='color:red;'>Email not found!</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
</head>
<body>
    <h2>Reset Your Password</h2>
    <?php echo $msg; ?>
    <form method="post">
        <input type="email" name="email" required placeholder="Enter your email">
        <button type="submit" name="reset">Send Reset Link</button>
    </form>
</body>
</html>
