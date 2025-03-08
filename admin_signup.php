<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Signup</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Admin Signup</h2>

        <!-- Success/Error Message -->
        <?php 
        session_start();
        if (isset($_SESSION['message'])): ?>
            <div class="alert alert-info"><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></div>
        <?php endif; ?>

        <form action="admin_signup_process.php" method="POST">
            <div class="mb-3">
                <label class="form-label">Username:</label>
                <input type="text" class="form-control" name="auser" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email:</label>
                <input type="email" class="form-control" name="aemail" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password:</label>
                <input type="password" class="form-control" name="apass" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Date of Birth:</label>
                <input type="date" class="form-control" name="adob" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Phone:</label>
                <input type="tel" class="form-control" name="aphone" required>
            </div>
            <button type="submit" class="btn btn-primary">Signup</button>
        </form>
    </div>
</body>
</html>
