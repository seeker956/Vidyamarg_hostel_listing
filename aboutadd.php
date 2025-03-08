<?php 
session_start();
require("config.php");

if (!isset($_SESSION['auser'])) {
    header("location:index.php");
    exit();
}

$error = "";
$msg = "";
if (isset($_POST['addabout'])) {
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $content = mysqli_real_escape_string($con, $_POST['content']);
    
    if (!empty($_FILES['aimage']['name'])) {
        $aimage = $_FILES['aimage']['name'];
        $temp_name1 = $_FILES['aimage']['tmp_name'];
        $target_dir = "upload/" . basename($aimage);
        
        if (move_uploaded_file($temp_name1, $target_dir)) {
            $sql = "INSERT INTO about (title, content, image) VALUES ('$title', '$content', '$aimage')";
            if (mysqli_query($con, $sql)) {
                $msg = "<p class='alert alert-success'>Inserted Successfully</p>";
            } else {
                $error = "<p class='alert alert-warning'>* Database Insertion Failed</p>";
            }
        } else {
            $error = "<p class='alert alert-danger'>* File Upload Failed</p>";
        }
    } else {
        $error = "<p class='alert alert-danger'>* Please Upload an Image</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vidyamarg HOMES | About</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include("header.php"); ?>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">About</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">About</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">About Us</h2>
                        </div>
                        <form method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <?php echo $error; ?>
                                <?php echo $msg; ?>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Title</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" name="title" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Image</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="aimage" type="file" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Content</label>
                                    <div class="col-lg-9">
                                        <textarea class="tinymce form-control" name="content" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="text-left">
                                    <input type="submit" class="btn btn-primary" value="Submit" name="addabout">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/plugins/tinymce/tinymce.min.js"></script>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>
