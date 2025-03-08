<?php 
include("config.php");
$error="";
$msg="";
if(isset($_POST['send']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$subject=$_POST['subject'];
	$message=$_POST['message'];
	
	if(!empty($name) && !empty($email) && !empty($phone) && !empty($subject) && !empty($message))
	{
		
		$sql="INSERT INTO contact (name,email,phone,subject,message) VALUES ('$name','$email','$phone','$subject','$message')";
		   $result=mysqli_query($con, $sql);
		   if($result){
			   $msg = "<p class='alert alert-success'>Message Send Successfully</p> ";
		   }
		   else{
			   $error = "<p class='alert alert-warning'>Message Not Send Successfully</p> ";
		   }
	}else{
		$error = "<p class='alert alert-warning'>Please Fill all the fields</p>";
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

<!-- Meta Tags for SEO -->
<meta name="description" content="Find the best hostels and PG accommodations in Patna. Compare prices, amenities, and book your stay easily at Vidyamarg Property Listing.">
<meta name="keywords" content="hostels in city, PG accommodation, boys hostel, girls hostel, co-living spaces, best PG near me, affordable hostel rooms">
<meta name="author" content="Vidyamarg">
<meta name="robots" content="index, follow">
<link rel="canonical" href="https://www.vidyamarg.com/property-listing">

<!-- Favicon -->
<link rel="shortcut icon" href="images/favicon.ico">

<!-- Google Verification (For Search Console) -->
<meta name="google-site-verification" content="YOUR_VERIFICATION_CODE_HERE">

<!-- Open Graph Meta Tags (For Social Media Sharing) -->
<meta property="og:title" content="Vidyamarg Property Listing - Find Hostels & PGs">
<meta property="og:description" content="Discover the best hostel & PG accommodations in [City Name].">
<meta property="og:image" content="https://www.vidyamarg.com/images/hostel-banner.jpg">
<meta property="og:url" content="https://www.vidyamarg.com/property-listing">
<meta property="og:type" content="website">

<!-- Twitter Card (For Twitter Sharing) -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Vidyamarg Property Listing - Find Hostels & PGs">
<meta name="twitter:description" content="Find the best hostels and PG accommodations in [City Name].">
<meta name="twitter:image" content="https://www.vidyamarg.com/images/hostel-banner.jpg">

<!-- Structured Data for Local Business SEO -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "Vidyamarg Property Listing",
  "url": "https://www.vidyamarg.com",
  "logo": "https://www.vidyamarg.com/images/logo.png",
  "description": "Find the best hostels and PGs in Patna with complete details, pricing, and amenities.",
  "address": {
    "@type": "Voring Road",
    "streetAddress": "Boring Road",
    "addressLocality": "Patna",
    "addressRegion": "Bihar",
    "postalCode": "800013",
    "addressCountry": "IN"
  },
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": "+91 ",
    "contactType": "customer service"
  }
}
</script>

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">
<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

<!-- CSS Links -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">

<!-- Title -->
<title>Best Hostels & PGs in Patna | Vidyamarg Property Listing</title>
</head>

<body>

<div id="page-wrapper">
    <div class="row"> 
        <!--	Header start  -->
		<?php include("include/header.php");?>
        <!--	Header end  -->
        
        <!--	Banner -->
         <div class="banner-full-row page-banner" style="background-image:url('images/breadcromb.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Contact</b></h2>
                    </div>
                    <div class="col-md-6">
                        <nav aria-label="breadcrumb" class="float-left float-md-right">
                            <ol class="breadcrumb bg-transparent m-0 p-0">
                                <li class="breadcrumb-item text-white"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Contact</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div> 
        <!--	Banner -->
		
        <!--	Contact Information -->
        <div class="full-row">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mb-5 bg-secondary">
                        <div class="contact-info">
                            <h3 class="mb-4 mt-4 text-white">Contacts</h3>
							
                            <ul>
                                <li class="d-flex mb-4"> <i class="fas fa-map-marker-alt text-white mr-2 font-13 mt-1"></i>
                                    <div class="contact-address">
                                        <h5 class="text-white">Address</h5>
                                        <span class="text-white">East Boring Canal Road, Patna</span> <br>
										<span class="text-white">Sisodia Palace, Patna</span>
										</div>
                                </li>
                                <li class="d-flex mb-4"> <i class="fas fa-phone-alt text-white mr-2 font-13 mt-1"></i>
                                    <div class="contact-address">
                                        <h5 class="text-white">Call Us</h5>
                                        <span class="d-table text-white">+91 7281000180</span>
										<span class="text-white">+91 7281000181 </span>
									</div>
                                </li>
                                <li class="d-flex mb-4"> <i class="fas fa-envelope text-white mr-2 font-13 mt-1"></i>
                                    <div class="contact-address">
                                        <h5 class="text-white">Email Adderss</h5>
										<span class="d-table text-white">helpline@Vidyamarg.org</span>
										<span class="text-white">helpline@vidyamarg.org</span>
										</div>
                                </li>
                            </ul>
                        </div>
                    </div>
					<div class="col-lg-1"></div>
                    <div class="col-md-12 col-lg-7">
						<div class="container">
                        <div class="row">
							<div class="col-lg-12">
								<h2 class="text-secondary double-down-line text-center mb-5">Get In Touch</h2>
								<?php echo $msg; ?><?php echo $error; ?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<form class="w-100" action="#" method="post">
									<div class="row">
										<div class="row mb-4">
											<div class="form-group col-lg-6">
												<input type="text"  name="name" class="form-control" placeholder="Your Name*">
											</div>
											<div class="form-group col-lg-6">
												<input type="text"  name="email" class="form-control" placeholder="Email Address*">
											</div>
											<div class="form-group col-lg-6">
												<input type="text"  name="phone" class="form-control" placeholder="Phone" maxlength="10">
											</div>
											<div class="form-group col-lg-6">
												<input type="text" name="subject"  class="form-control" placeholder="Subject">
											</div>
											<div class="col-lg-12">
												<div class="form-group">
													<textarea name="message" class="form-control" rows="5" placeholder="Type Comments..."></textarea>
												</div>
											</div>
										</div>
										<button type="submit" value="send message" name="send" class="btn btn-success">Send Message</button>
									</div>
								</form>
							</div>
						</div>
						</div>
					</div>
                </div>
            </div>
        </div>
        <!--	Contact Inforamtion -->
        
        <!--	Map -->
		<iframe src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=Sisodia palace east boring road patna&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		<!--	Map -->
        
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
<script src="js/jquery.cookie.js"></script> 
<script src="js/custom.js"></script>  

</body>
</html>