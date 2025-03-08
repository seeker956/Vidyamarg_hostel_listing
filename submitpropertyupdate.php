<?php 
ini_set('session.cache_limiter', 'public');
session_cache_limiter(false);
session_start();
include("config.php");

// Check if user is logged in
if (!isset($_SESSION['uemail'])) {
    header("Location: login.php");
    exit();
}

$msg = "";

// Check if form is submitted
if (isset($_POST['add'])) {
    $pid = intval($_REQUEST['id']); // Ensure $pid is a valid integer

    // Fetch existing property data
    $query = $con->prepare("SELECT pimage, pimage1, pimage2, pimage3, pimage4, mapimage, topmapimage, groundmapimage FROM property WHERE id = ?");
    $query->bind_param("i", $pid);
    $query->execute();
    $result = $query->get_result();
    $row = $result->fetch_assoc();
    $query->close();

    if (!$row) {
        $msg = "<p class='alert alert-danger'>Property not found</p>";
        header("Location: feature.php?msg=" . urlencode($msg));
        exit();
    }

    // Sanitize inputs
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $content = mysqli_real_escape_string($con, $_POST['content']);
    $ptype = mysqli_real_escape_string($con, $_POST['ptype']);
    $bhk = mysqli_real_escape_string($con, $_POST['bhk']);
    $bed = mysqli_real_escape_string($con, $_POST['bed']);
    $balc = mysqli_real_escape_string($con, $_POST['balc']);
    $hall = mysqli_real_escape_string($con, $_POST['hall']);
    $stype = mysqli_real_escape_string($con, $_POST['stype']);
    $bath = mysqli_real_escape_string($con, $_POST['bath']);
    $kitc = mysqli_real_escape_string($con, $_POST['kitc']);
    $floor = mysqli_real_escape_string($con, $_POST['floor']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $city = mysqli_real_escape_string($con, $_POST['city']);
    $asize = mysqli_real_escape_string($con, $_POST['asize']);
    $loc = mysqli_real_escape_string($con, $_POST['loc']);
    $state = mysqli_real_escape_string($con, $_POST['state']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $uid = $_SESSION['uid'];
    $feature = mysqli_real_escape_string($con, $_POST['feature']);
    $totalfloor = mysqli_real_escape_string($con, $_POST['totalfl']);

    // Function to handle file upload
    function uploadFile($file, $existingFile) {
        if (!empty($file['name'])) {
            $fileName = time() . "_" . basename($file['name']); // Add timestamp for uniqueness
            $targetPath = "admin/property/" . $fileName;
            if (move_uploaded_file($file['tmp_name'], $targetPath)) {
                return $fileName;
            }
        }
        return $existingFile; // Return old file if no new file is uploaded
    }

    // Upload or retain existing images
    $aimage = uploadFile($_FILES['aimage'], $row['pimage']);
    $aimage1 = uploadFile($_FILES['aimage1'], $row['pimage1']);
    $aimage2 = uploadFile($_FILES['aimage2'], $row['pimage2']);
    $aimage3 = uploadFile($_FILES['aimage3'], $row['pimage3']);
    $aimage4 = uploadFile($_FILES['aimage4'], $row['pimage4']);

    $fimage = uploadFile($_FILES['fimage'], $row['mapimage']);
    $fimage1 = uploadFile($_FILES['fimage1'], $row['topmapimage']);
    $fimage2 = uploadFile($_FILES['fimage2'], $row['groundmapimage']);

    // Update property using prepared statement
    $sql = "UPDATE property 
            SET title=?, pcontent=?, type=?, bhk=?, stype=?, bedroom=?, bathroom=?, balcony=?, kitchen=?, hall=?, 
                floor=?, size=?, price=?, location=?, city=?, state=?, feature=?, 
                pimage=?, pimage1=?, pimage2=?, pimage3=?, pimage4=?, 
                uid=?, status=?, mapimage=?, topmapimage=?, groundmapimage=?, 
                totalfloor=? WHERE id=?";

    $stmt = $con->prepare($sql);
    $stmt->bind_param("sssssssssssssssssssssssssssi", 
        $title, $content, $ptype, $bhk, $stype, $bed, $bath, $balc, $kitc, $hall, 
        $floor, $asize, $price, $loc, $city, $state, $feature, 
        $aimage, $aimage1, $aimage2, $aimage3, $aimage4, 
        $uid, $status, $fimage, $fimage1, $fimage2, 
        $totalfloor, $pid
    );

    if ($stmt->execute()) {
        $msg = "<p class='alert alert-success'>Property Updated Successfully</p>";
    } else {
        $msg = "<p class='alert alert-warning'>Error: " . $stmt->error . "</p>";
    }

    $stmt->close();
    
    // Redirect to feature.php with message
    header("Location: feature.php?msg=" . urlencode($msg));
    exit();
} 
?>


<!DOCTYPE html>
<html lang="en">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Meta Tags -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="shortcut icon" href="images/favicon.ico">

<!--	Fonts
	========================================================-->
<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">

<!--	Css Link
	========================================================-->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="css/layerslider.css">
<link rel="stylesheet" type="text/css" href="css/color.css">
<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/login.css">

<!--	Title
	=========================================================-->
<title>Vidyamarg Property Listing</title>
</head>
<body>

<div id="page-wrapper">
    <div class="row"> 
        <!--	Header start  -->
		<?php include("include/header.php");?>
        <!--	Header end  -->
        
        <!--	Banner   --->
         <div class="banner-full-row page-banner" style="background-image:url('images/breadcromb.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Update Property</b></h2>
                    </div>
                    <div class="col-md-6">
                        <nav aria-label="breadcrumb" class="float-left float-md-right">
                            <ol class="breadcrumb bg-transparent m-0 p-0">
                                <li class="breadcrumb-item text-white"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Update Property</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div> 
         <!--	Banner   --->
		 
		 
	<div class="full-row">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-secondary double-down-line text-center">Edit Hostel</h2>
            </div>
        </div>
        <div class="row p-5 bg-white">
            <form method="post"  enctype="multipart/form-data">
                <div class="description">
                    <h5 class="text-secondary">Basic Information</h5>
                    <hr>

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Title</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="title" required placeholder="Enter Title" value="<?php echo $property['title']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Content</label>
                                <div class="col-lg-9">
                                    <textarea class="tinymce form-control" name="content" rows="10" cols="30"><?php echo $property['content']; ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Hostel Type</label>
                                <div class="col-lg-9">
                                    <select class="form-control" required name="ptype">
                                        <option value="">Select Type</option>
                                        <option value="Boys" <?php if ($property['ptype'] == 'Boys') echo 'selected'; ?>>Boys</option>
                                        <option value="Girls" <?php if ($property['ptype'] == 'Girls') echo 'selected'; ?>>Girls</option>
                                        <option value="Co-living" <?php if ($property['ptype'] == 'Co-living') echo 'selected'; ?>>Co-living</option>
                                        <option value="Family PG" <?php if ($property['ptype'] == 'Family PG') echo 'selected'; ?>>Family PG</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Room Type</label>
                                <div class="col-lg-9">
                                    <select class="form-control" required name="stype">
                                        <option value="">Select Room Type</option>
                                        <option value="Budget" <?php if ($property['stype'] == 'Budget') echo 'selected'; ?>>Budget</option>
                                        <option value="Luxury" <?php if ($property['stype'] == 'Luxury') echo 'selected'; ?>>Luxury</option>
                                        <option value="Shared" <?php if ($property['stype'] == 'Shared') echo 'selected'; ?>>Shared</option>
                                        <option value="Private" <?php if ($property['stype'] == 'Private') echo 'selected'; ?>>Private</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Bathroom</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="bath" required placeholder="Enter Bathroom" value="<?php echo $property['bath']; ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <h5 class="text-secondary">Price & Location</h5>
                    <hr>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Price</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="price" required placeholder="Enter Price" value="<?php echo $property['price']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">City</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="city" required placeholder="Enter City" value="<?php echo $property['city']; ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <h5 class="text-secondary">Image & Status</h5>
                    <hr>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Current Image</label>
                                <div class="col-lg-9">
                                    <img src="uploads/<?php echo $property['image']; ?>" width="100">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Change Image</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="aimage" type="file">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-lg-9 offset-lg-3">
                            <button type="submit" class="btn btn-primary">Update Property</button>
                            <a href="dashboard.php" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
        
        
        <!--	Footer   start-->
		<?php include("include/footer.php");?>
		<!--	Footer   start-->
        
        <!-- Scroll to top --> 
        <a href="#" class="bg-secondary text-white hover-text-secondary" id="scroll"><i class="fas fa-angle-up"></i></a> 
        <!-- End Scroll To top --> 
    </div>
</div>
<!-- Wrapper End --> 

<!--	Js Link
============================================================--> 
<script src="js/jquery.min.js"></script> 
<script src="js/tinymce/tinymce.min.js"></script>
<script src="js/tinymce/init-tinymce.min.js"></script>
<!--jQuery Layer Slider --> 
<script src="js/greensock.js"></script> 
<script src="js/layerslider.transitions.js"></script> 
<script src="js/layerslider.kreaturamedia.jquery.js"></script> 
<!--jQuery Layer Slider --> 
<script src="js/popper.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/owl.carousel.min.js"></script> 
<script src="js/tmpl.js"></script> 
<script src="js/jquery.dependClass-0.1.js"></script> 
<script src="js/draggable-0.1.js"></script> 
<script src="js/jquery.slider.js"></script> 
<script src="js/wow.js"></script> 
<script src="js/custom.js"></script>
</body>
</html>