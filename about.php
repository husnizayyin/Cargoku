<?php

  define("_VALID_PHP", true);
  require_once("init.php");
  

?>
<!DOCTYPE html>
<html lang="en">

<head>
 
  <!--Meta-->
  <meta charset="UTF-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="keywords" content="Courier DEPRIXA-Integral Web System" />
  <meta name="author" content="Jaomweb">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!--Favicon-->
  <link rel="icon" href="uploads/favicon.png">
  
  <!-- Title-->
  <title>About Us | <?php echo $core->site_name;?></title>
  
  <!--Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Dosis:400,500,600,700%7COpen+Sans:400,600,700" rel="stylesheet">
  
	<!--Icon fonts-->
	<link rel="stylesheet" href="assets-theme/vendor/strokegap/style.css">
	<link rel="stylesheet" href="assets-theme/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets-theme/vendor/linearicons/style.css">
  
	<link rel="stylesheet" href="assets-theme/css/bundle.css">
	<link rel="stylesheet" href="assets-theme/css/style.css">
  
</head>

 <body id="top">
 
 <!--headers-->
 <header class="header header-shrink header-inverse fixed-top">
	<div class="container">
		<nav class="navbar navbar-expand-lg px-md-0">
			
			<?php require_once("header.php");?> 
			
		</nav>
	</div> <!-- END container-->
</header> <!-- END header -->

<section data-dark-overlay="6" data-init="parallax" class="u-py-30 u-pt-lg-200 u-pb-lg-50 u-flex-center" style="background:url(assets-theme/img/about/hero.jpg);">
  <div class="container">
    <div class="row">
    	<div class="col-12 text-center text-white">
    		<h1 class="text-white">About Us</h1>
    		<div class="u-h-4 u-w-50 bg-white rounded mx-auto my-4"></div>
    		<p class="lead">
    			Meet the amazing team behind this project and find out more <br> about how we work.
    		</p>
    	</div>
    </div> <!-- END row-->
  </div> <!-- END container-->
</section> <!-- END intro-hero-->

<section>
	<div class="container">
		<div class="row align-items-center">
		
			<div class="col-lg-5 mb-4 mr-auto text-center">
				<img class="wow fadeInLeft w-100 rounded" src="assets-theme/img/about/sc-1.jpg" alt="">
			</div> <!-- END col-lg-6 pl-lg-5 -->
			
			<div class="col-lg-6">
				<h2 class="h1">
					<span class="text-primary">Who</span> We Are
				</h2>
				<div class="u-h-4 u-w-50 bg-primary rounded mt-4 mb-5"></div>
				<p class="mb-5">
					Nam liber tempor cum soluta nobis eleifend option congue is nihil imper iper tem por legere me that doming vulputate velit esse molestie possim wisi enim ad placerat facer possim.
				</p>
				<ul class="list-unstyled u-fw-600">
					<li class="d-flex align-items-center mb-2">
						<span class="lnr lnr-checkmark-circle mr-2 color-primary u-fs-20"></span>
						Professional and easy to use software
					</li>
					<li class="d-flex align-items-center mb-2">
						<span class="lnr lnr-checkmark-circle mr-2 color-primary u-fs-20"></span>
						Setup and installations takes 30 seconds
					</li>
					<li class="d-flex align-items-center mb-2">
						<span class="lnr lnr-checkmark-circle mr-2 color-primary u-fs-20"></span>
						Perfect for any device with pixel perfect design
					</li>
					<li class="d-flex align-items-center mb-2">
						<span class="lnr lnr-checkmark-circle mr-2 color-primary u-fs-20"></span>
						Setup and installations really really fast
					</li>
				</ul>
			</div> <!-- END col-lg-6 ml-auto-->
		</div> <!-- END row-->
	</div> <!-- END container-->
</section> <!-- END section-->
                
<hr class="m-0">

<section>
	<div class="container">
		<div class="row align-items-center">			
			<div class="col-lg-6">
				<h2 class="h1">
					What We Do
				</h2>
				<div class="u-h-4 u-w-50 bg-primary rounded mt-4 mb-5"></div>
				<p>
					Nam liber tempor cum soluta nobis eleifend option congue is nihil imper iper tem por legere me that doming vulputate velit esse molestie possim wisi enim ad placerat facer possim.
				</p>
			<div class="media mt-4">
				<span class="icon icon-Web text-primary u-fs-28 mr-3 mt-2"></span>
					<div class="media-body">
						<h4 class="h5">
							Work With Any Team
						</h4>
						<p>
							Nam liber tempor cum soluta nobis eleifend option congue is nihil imper  per tem por legere me that doming vulputate.
						</p>
					</div>
				</div>
			<div class="media mt-4">
				<span class="icon icon-Bulb text-primary u-fs-28 mr-3 mt-2"></span>
					<div class="media-body">
						<h4 class="h5">
							A Productivity Platform
						</h4>
						<p>
							Nam liber tempor cum soluta nobis eleifend option congue is nihil imper  per tem por legere me that doming vulputate.
						</p>
					</div>
				</div>
			</div> <!-- END col-lg-6 -->
			<div class="col-lg-5 ml-auto text-center">
				<img class="wow fadeInRight w-100 rounded" src="assets-theme/img/about/sc-2.jpg" alt="">
			</div> <!-- END col-lg-6 pl-lg-5 -->
		</div> <!-- END row-->
	</div> <!-- END container-->
</section> <!-- END section-->    


<?php require_once("footer.php");?> 

	<div class="scroll-top bg-white box-shadow-v1">
		<i class="fa fa-angle-up" aria-hidden="true"></i>
	</div> 
	
	<script src="assets-theme/js/bundle.js"></script>
	<script src="assets-theme/js/fury.js"></script>

  </body>	

</html>