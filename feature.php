<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
if(!isset($_SESSION['uemail']))
{
	header("location:login.php");
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
                        <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>User Listed Property</b></h2>
                    </div>
                    <div class="col-md-6">
                        <nav aria-label="breadcrumb" class="float-left float-md-right">
                            <ol class="breadcrumb bg-transparent m-0 p-0">
                                <li class="breadcrumb-item text-white"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">User Listed Property</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
         <!--	Banner   --->
		 
		 
<!-- Submit Property -->
<div class="full-row bg-gray">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-12">
                <h2 class="text-secondary double-down-line text-center">User Listed Property</h2>
                <?php 
                if (isset($_GET['msg'])) { 
                    echo '<div class="alert alert-info">' . htmlspecialchars($_GET['msg']) . '</div>'; 
                }
                ?>
            </div>
        </div>

        <table class="items-list col-lg-12 table-hover" style="border-collapse: inherit;">
            <thead>
                <tr class="bg-dark text-white">
                    <th class="font-weight-bolder">Properties</th>
                    <th class="font-weight-bolder">BHK</th>
                    <th class="font-weight-bolder">Type</th>
                    <th class="font-weight-bolder">Added Date</th>
                    <th class="font-weight-bolder">Status</th>
                    <th class="font-weight-bolder">Update</th>
                    <th class="font-weight-bolder">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                // session_start();
                // include("db_connection.php"); // Ensure you have a proper DB connection

                if (isset($_SESSION['uid'])) {
                    $uid = $_SESSION['uid'];
                    $query = mysqli_query($con, "SELECT * FROM `property` WHERE uid='$uid'");

                    if (mysqli_num_rows($query) > 0) {
                        while ($row = mysqli_fetch_assoc($query)) {
                            ?>
                            <tr>
                                <td>
                                    <img src="admin/property/<?php echo htmlspecialchars($row['image']); ?>" 
                                         alt="Property Image" width="100">
                                    <div class="property-info d-table">
                                        <h5 class="text-secondary text-capitalize">
                                            <a href="propertydetail.php?pid=<?php echo htmlspecialchars($row['id']); ?>">
                                                <?php echo htmlspecialchars($row['title']); ?>
                                            </a>
                                        </h5>
                                        <span class="font-14 text-capitalize">
                                            <i class="fas fa-map-marker-alt text-success font-13"></i>&nbsp; 
                                            <?php echo htmlspecialchars($row['location']); ?>
                                        </span>
                                        <div class="price mt-3">
                                            <span class="text-success">$ <?php echo htmlspecialchars($row['price']); ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td><?php echo htmlspecialchars($row['bhk']); ?></td>
                                <td class="text-capitalize">For <?php echo htmlspecialchars($row['type']); ?></td>
                                <td><?php echo htmlspecialchars($row['added_date']); ?></td>
                                <td class="text-capitalize"><?php echo htmlspecialchars($row['status']); ?></td>
                                <td><a class="btn btn-info" href="submitpropertyupdate.php?id=<?php echo htmlspecialchars($row['uid']); ?>">Update</a></td>
                                <td><a class="btn btn-danger" href="submitpropertydelete.php?id=<?php echo htmlspecialchars($row['uid']); ?>" 
                                       onclick="return confirm('Are you sure you want to delete this property?');">Delete</a></td>
                            </tr>
                            <?php 
                        } 
                    } else {
                        echo '<tr><td colspan="7" class="text-center text-danger">No properties found.</td></tr>';
                    }
                } else {
                    echo '<tr><td colspan="7" class="text-center text-danger">User not logged in.</td></tr>';
                }
                ?>
            </tbody>
        </table>            
    </div>
</div>
<!-- Submit Property -->


        
        
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