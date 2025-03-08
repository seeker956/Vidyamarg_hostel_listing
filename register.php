<?php 
include("config.php");

$error = "";
$msg = "";

// Check database connection
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

if (isset($_POST['insert'])) {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $pass = htmlspecialchars(trim($_POST['pass']));
    $dob = htmlspecialchars(trim($_POST['dob']));
    $phone = htmlspecialchars(trim($_POST['phone']));

    if (!empty($name) && !empty($email) && !empty($pass) && !empty($dob) && !empty($phone)) {
        
        // Check if email or username already exists
        $check_stmt = $con->prepare("SELECT auser, aemail FROM admin WHERE auser = ? OR aemail = ?");
        $check_stmt->bind_param("ss", $name, $email);
        $check_stmt->execute();
        $check_stmt->store_result();
        
        if ($check_stmt->num_rows > 0) {
            $error = '* Username or Email already exists! Choose a different one.';
        } else {
            // Check password strength
            if (strlen($pass) < 6) {
                $error = "* Password must be at least 6 characters long.";
            } else {
                // Hash the password securely before storing
                $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

                // Use prepared statement to prevent SQL injection
                $stmt = $con->prepare("INSERT INTO admin (auser, aemail, apass, adob, aphone) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("sssss", $name, $email, $hashed_pass, $dob, $phone);

                if ($stmt->execute()) {
                    header("Location: index.php?success=1"); // Redirect to login page
                    exit();
                } else {
                    $error = '* Registration failed: ' . $stmt->error;
                }
                $stmt->close();
            }
        }
        $check_stmt->close();
    } else {
        $error = "* Please fill in all the fields!";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Vidyamarg - Register</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
		
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>
	
		<!-- Main Wrapper -->
        <div class="page-wrappers login-body">
            <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                    	
                        <div class="login-right">
							<div class="login-right-wrap">
								<h1>Register</h1>
								<p class="account-subtitle">Access to our dashboard</p>
								<p style="color:red;"><?php echo $error; ?></p>
								<p style="color:green;"><?php echo $msg; ?></p>
								<!-- Form -->
								<form method="post">
									<div class="form-group">
										<input class="form-control" type="text" placeholder="Name" name="name">
									</div>
									<div class="form-group">
										<input class="form-control" type="email" placeholder="Email" name="email">
									</div>
									<div class="form-group">
										<input class="form-control" type="text" placeholder="Password" name="pass">
									</div>
									<div class="form-group">
										<input class="form-control" type="date" placeholder="Date of Birth" name="dob">
									</div>
									<div class="form-group">
										<input class="form-control" type="text" placeholder="Phone" name="phone" maxlength="10">
									</div>
									<div class="form-group mb-0">
										<input class="btn btn-primary btn-block" type="submit" name="insert" Value="Register">
									</div>
								</form>
								<!-- /Form -->
								
								<div class="login-or">
									<span class="or-line"></span>
									<span class="span-or">or</span>
								</div>
								
								<!-- Social Login -->
								<div class="social-login">
									<span>Register with</span>
									<a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
									<a href="#" class="google"><i class="fa fa-google"></i></a>
									<a href="#" class="facebook"><i class="fa fa-twitter"></i></a>
									<a href="#" class="google"><i class="fa fa-instagram"></i></a>
								</div>
								<!-- /Social Login -->
								
								<div class="text-center dont-have">Already have an account? <a href="index.php">Login</a></div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
    </body>

</html>