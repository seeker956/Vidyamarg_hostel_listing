<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
if(!isset($_SESSION['uemail']))
{
	header("location:login.php");
}

//// code insert
//// add code
$error="";
$msg="";
if(isset($_POST['add']))
{
	
	$title=$_POST['title'];
	$content=$_POST['content'];
	$ptype=$_POST['ptype'];
	$bhk=$_POST['bhk'];
	$bed=$_POST['bed'];
	$balc=$_POST['balc'];
	$hall=$_POST['hall'];
	$stype=$_POST['stype'];
	$bath=$_POST['bath'];
	$kitc=$_POST['kitc'];
	$floor=$_POST['floor'];
	$price=$_POST['price'];
	$city=$_POST['city'];
	$asize=$_POST['asize'];
	$loc=$_POST['loc'];
	$state=$_POST['state'];
	$status=$_POST['status'];
	$uid=$_SESSION['uid'];
	$feature=$_POST['feature'];
	
	$totalfloor=$_POST['totalfl'];

	$isFeatured=$_POST['isFeatured'];
	
	$aimage=$_FILES['aimage']['name'];
	$aimage1=$_FILES['aimage1']['name'];
	$aimage2=$_FILES['aimage2']['name'];
	$aimage3=$_FILES['aimage3']['name'];
	$aimage4=$_FILES['aimage4']['name'];
	
	$fimage=$_FILES['fimage']['name'];
	$fimage1=$_FILES['fimage1']['name'];
	$fimage2=$_FILES['fimage2']['name'];
	
	$temp_name  =$_FILES['aimage']['tmp_name'];
	$temp_name1 =$_FILES['aimage1']['tmp_name'];
	$temp_name2 =$_FILES['aimage2']['tmp_name'];
	$temp_name3 =$_FILES['aimage3']['tmp_name'];
	$temp_name4 =$_FILES['aimage4']['tmp_name'];
	
	$temp_name5 =$_FILES['fimage']['tmp_name'];
	$temp_name6 =$_FILES['fimage1']['tmp_name'];
	$temp_name7 =$_FILES['fimage2']['tmp_name'];
	
	move_uploaded_file($temp_name,"admin/property/$aimage");
	move_uploaded_file($temp_name1,"admin/property/$aimage1");
	move_uploaded_file($temp_name2,"admin/property/$aimage2");
	move_uploaded_file($temp_name3,"admin/property/$aimage3");
	move_uploaded_file($temp_name4,"admin/property/$aimage4");
	
	move_uploaded_file($temp_name5,"admin/property/$fimage");
	move_uploaded_file($temp_name6,"admin/property/$fimage1");
	move_uploaded_file($temp_name7,"admin/property/$fimage2");
	
	$sql="insert into property (title,pcontent,type,bhk,stype,bedroom,bathroom,balcony,kitchen,hall,floor,size,price,location,city,state,feature,pimage,pimage1,pimage2,pimage3,pimage4,uid,status,mapimage,topmapimage,groundmapimage,totalfloor, isFeatured)
	values('$title','$content','$ptype','$bhk','$stype','$bed','$bath','$balc','$kitc','$hall','$floor','$asize','$price',
	'$loc','$city','$state','$feature','$aimage','$aimage1','$aimage2','$aimage3','$aimage4','$uid','$status','$fimage','$fimage1','$fimage2','$totalfloor', '$isFeatured')";
	$result=mysqli_query($con,$sql);
	if($result)
		{
			$msg="<p class='alert alert-success'>Property Inserted Successfully</p>";
					
		}
		else
		{
			$error="<p class='alert alert-warning'>Property Not Inserted Some Error</p>";
		}
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
<title>Add Hostel - Vidyamarg Property Listing </title>
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
                        <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Add Property</b></h2>
                    </div>
                    <div class="col-md-6">
                        <nav aria-label="breadcrumb" class="float-left float-md-right">
                            <ol class="breadcrumb bg-transparent m-0 p-0">
                                <li class="breadcrumb-item text-white"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Add Property</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
         <!--	Banner   --->
		 
		 
		<!--	Submit property   -->
        <div class="full-row">
            <div class="container">
                    <div class="row">
						<div class="col-lg-12">
							<h2 class="text-secondary double-down-line text-center">Add Hostel</h2>
                        </div>
					</div>
                    <div class="row p-5 bg-white">
                        <form method="post" enctype="multipart/form-data">
								<div class="description">
									<h5 class="text-secondary">Basic Information</h5><hr>
								
									
										<div class="row">
											<div class="col-xl-12">
												<div class="form-group row">
													<label class="col-lg-2 col-form-label">Hostel Name</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="title" required placeholder="Enter Your Hostel Name ">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-2 col-form-label">description</label>
													<div class="col-lg-9">
														<textarea class="tinymce form-control" name="content" rows="10" cols="30"></textarea>
													</div>
												</div>
												
											</div>
												<div class="col-xl-6">
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Hostel Type</label>
													<div class="col-lg-9">
														<select class="form-control" required name="ptype">
															<option value="">Select Type</option>
															<option value="Boys">Boys</option>
                                                            <option value="Girls">Girls</option>
                                                            <option value="Co-living">Co-living</option>
                                                            <option value="Family PG">Family PG</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Room Type</label>
													<div class="col-lg-9">
														<select class="form-control" required name="stype">
															<option value="">Select Status</option>
															<option value="Budget">Budget</option>
															<option value="Luxury">Luxury</option>
															<option value="Shared">Shared</option>
															<option value="Private">Private</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Bathroom</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="bath" required placeholder="Enter Bathroom (only no 1 to 10)">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Kitchen</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="kitc" required placeholder="Enter Kitchen (only no 1 to 10)">
													</div>
												</div>
												
											</div>    
											<div class="col-xl-6">
												<div class="form-group row mb-3">
													<label class="col-lg-3 col-form-label">BHK</label>
													<div class="col-lg-9">
														<select class="form-control" required name="bhk">
															<option value="">Select BHK</option>
															<option value="1 BHK">1 BHK</option>
															<option value="2 BHK">2 BHK</option>
															<option value="3 BHK">3 BHK</option>
															<option value="4 BHK">4 BHK</option>
															<option value="5 BHK">5 BHK</option>
															<option value="1,2 BHK">1,2 BHK</option>
															<option value="2,3 BHK">2,3 BHK</option>
															<option value="2,3,4 BHK">2,3,4 BHK</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Bedroom</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="bed" required placeholder="Enter Bed  (only no 1 to 10)">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Balcony</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="balc" required placeholder="Enter Balcony  (only no 1 to 10)">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Hall</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="hall" required placeholder="Enter Hall  (only no 1 to 10)">
													</div>
												</div>
												
											</div>
										</div>
										<h5 class="text-secondary">Price & Location</h5><hr>
										<div class="row">
											<div class="col-xl-6">
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Floor</label>
													<div class="col-lg-9">
														<select class="form-control" required name="floor">
															<option value="">Select Floor</option>
															<option value="1st Floor">1st Floor</option>
															<option value="2nd Floor">2nd Floor</option>
															<option value="3rd Floor">3rd Floor</option>
															<option value="4th Floor">4th Floor</option>
															<option value="5th Floor">5th Floor</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Price</label>
													<div class="col-lg-9">
														<select class="form-control" id="price" name="price" required>
                       										<option value="" disabled selected>Select Price</option>
                       										<option value="3000">₹3000</option>
                      									    <option value="4000">₹4000</option>
                      										<option value="5000">₹5000</option>
                       										<option value="6000">₹6000</option>
                       										<option value="7000">₹7000</option>
                       										<option value="8000">₹8000</option>
                       										<option value="9000">₹9000</option>
                       										<option value="10000">₹10,000</option>
                    									</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Landmark</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="city" required placeholder="Enter Landmark">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">City</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="state" required placeholder="Enter City">
													</div>
												</div>
											</div>
											<div class="col-xl-6">
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Total Floor</label>
													<div class="col-lg-9">
														<select class="form-control" required name="totalfl">
															<option value="">Select Floor</option>
															<option value="1 Floor">1 Floor</option>
															<option value="2 Floor">2 Floor</option>
															<option value="3 Floor">3 Floor</option>
															<option value="4 Floor">4 Floor</option>
															<option value="5 Floor">5 Floor</option>
															<option value="6 Floor">6 Floor</option>
															<option value="7 Floor">7 Floor</option>
															<option value="8 Floor">8 Floor</option>
															<option value="9 Floor">9 Floor</option>
															<option value="10 Floor">10 Floor</option>
															<option value="11 Floor">11 Floor</option>
															<option value="12 Floor">12 Floor</option>
															<option value="13 Floor">13 Floor</option>
															<option value="14 Floor">14 Floor</option>
															<option value="15 Floor">15 Floor</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Area Size</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="asize" required placeholder="Enter Area Size (in sqrt)">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Address</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="loc" required placeholder="Enter Address">
													</div>
												</div>
												
											</div>
										</div>
										
										<div class="form-group row">
											<label class="col-lg-2 col-form-label">Feature</label>
											<div class="col-lg-9">
											<p class="alert alert-danger">* Important Please Do Not Remove Below Content Only Change <b>Yes</b> Or <b>No</b> or Details and Do Not Add More Details</p>
											
											<textarea class="tinymce form-control" name="feature" rows="10" cols="30">
												<!---feature area start--->
												<h1 class="text-center mt-4">Hostel Amenities</h1>
												<div class="container mt-4">
    <div class="row">
        <!-- General Amenities -->
        <div class="col-md-4">
            <h5 class="text-primary">General Amenities</h5>
            <ul>
                <li><strong>Washing Machine:</strong> Yes</li>
                <li><strong>Lift:</strong> No</li>
                <li><strong>Warden Contact:</strong> 9876543210</li>
                <li><strong>CCTV Camera:</strong> Yes</li>
            </ul>
        </div>

        <!-- Connectivity & Power -->
        <div class="col-md-4">
            <h5 class="text-primary">Connectivity & Power</h5>
            <ul>
                <li><strong>WiFi:</strong> Yes</li>
                <li><strong>Power Backup:</strong> No</li>
                <li><strong>Food:</strong> 3 Times</li>
                <li><strong>Cleaning:</strong> Daily</li>
            </ul>
        </div>

        <!-- Accommodation -->
        <div class="col-md-4">
            <h5 class="text-primary">Accommodation</h5>
            <ul>
                <li><strong>Parking:</strong> Available</li>
                <li><strong>Guest Room for Parents:</strong> No</li>
                <li><strong>Attached Washroom:</strong> Yes</li>
            </ul>
        </div>
    </div>

    <div class="row mt-3">
        <!-- Building Details -->
        <div class="col-md-4">
            <h5 class="text-primary">Building Details</h5>
            <ul>
                <li><strong>Building Age:</strong> 5 Years</li>
                <li><strong>FSSAI License:</strong> Yes</li>
                <li><strong>Fire Safety:</strong> Available</li>
            </ul>
        </div>

        <!-- Transport & Library -->
        <div class="col-md-4">
            <h5 class="text-primary">Transport & Library</h5>
            <ul>
                <li><strong>Transport Facility:</strong> Yes</li>
                <li><strong>Library:</strong> Available</li>
                <li><strong>Nearby Institute Distance:</strong> 500m</li>
            </ul>
        </div>

        <!-- Cooling & Heating -->
        <div class="col-md-4">
            <h5 class="text-primary">Cooling & Heating</h5>
            <ul>
                <li><strong>Geyser:</strong> No</li>
                <li><strong>AC Availability:</strong> Yes</li>
                <li><strong>Cooler Available:</strong> No</li>
            </ul>
        </div>
    </div>

    <div class="row mt-3">
        <!-- Room & Washroom -->
        <div class="col-md-4">
            <h5 class="text-primary">Room & Washroom</h5>
            <ul>
                <li><strong>Attached Washroom:</strong> Yes</li>
                <li><strong>Wardrobe for Every Student:</strong> Yes</li>
                <li><strong>Bed Type:</strong> Bed Box</li>
            </ul>
        </div>

        <!-- Staff & Security -->
        <div class="col-md-4">
            <h5 class="text-primary">Staff & Security</h5>
            <ul>
                <li><strong>Staff Behavior:</strong> Friendly</li>
                <li><strong>Warden Contact:</strong> Not Provided</li>
                <li><strong>Hostel Near By:</strong> Not Provided</li>
            </ul>
        </div>

        <!-- Study & Comfort -->
        <div class="col-md-4">
            <h5 class="text-primary">Study & Comfort</h5>
            <ul>
                <li><strong>Study Table:</strong> Available</li>
                <li><strong>Chair for Every Student:</strong> Yes</li>
            </ul>
        </div>
    </div>
</div>

        								<!---feature area end---->
											</textarea>
											</div>
										</div>
												
										<h5 class="text-secondary">Image & Status</h5><hr>
										<div class="row">
											<div class="col-xl-6">
												
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage" type="file" required="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image 2</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage2" type="file" required="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image 4</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage4" type="file" required="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Status</label>
													<div class="col-lg-9">
														<select class="form-control"  required name="status">
															<option value="">Select Status</option>
															<option value="available">Available</option>
															<option value="sold out">Sold Out</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Basement Floor Plan Image</label>
													<div class="col-lg-9">
														<input class="form-control" name="fimage1" type="file">
													</div>
												</div>
											</div>
											<div class="col-xl-6">
												
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image 1</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage1" type="file" required="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">image 3</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage3" type="file" required="">
													</div>
												</div>
												
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Floor Plan Image</label>
													<div class="col-lg-9">
														<input class="form-control" name="fimage" type="file">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Ground Floor Plan Image</label>
													<div class="col-lg-9">
														<input class="form-control" name="fimage2" type="file">
													</div>
												</div>
											</div>
										</div>

										<hr>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-lg-3 col-form-label"><b>Is Featured?</b></label>
													<div class="col-lg-9">
														<select class="form-control" required name="isFeatured">
															<option value="">Select...</option>
															<option value="0">No</option>
															<option value="1">Yes</option>
														</select>
													</div>
												</div>
											</div>
										</div>

										
											<input type="submit" value="Submit Property" class="btn btn-info"name="add" style="margin-left:200px;">
										
								</div>
								</form>
                    </div>            
            </div>
        </div>
	<!--	Submit property   -->
        
        
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