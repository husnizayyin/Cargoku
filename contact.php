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
  <title>Contact Us | <?php echo $core->site_name;?></title>
  
  <!--Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Dosis:400,500,600,700%7COpen+Sans:400,600,700" rel="stylesheet">
  
	<!--Icon fonts-->
	<link rel="stylesheet" href="assets-theme/vendor/strokegap/style.css">
	<link rel="stylesheet" href="assets-theme/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets-theme/vendor/linearicons/style.css">
  
	<link rel="stylesheet" href="assets-theme/css/bundle.css">
	<link rel="stylesheet" href="assets-theme/css/style.css">
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/jquery-ui.js"></script>
	<script src="assets/js/jquery.ui.touch-punch.js"></script>
	<script src="assets/js/jquery.wysiwyg.js"></script>
	<script src="assets/js/global.js"></script>
	<script src="assets/js/custom.js"></script>
  
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
 
<section data-dark-overlay="6" data-init="parallax" class="u-py-30 u-pt-lg-200 u-pb-lg-50 u-flex-center" style=" background:url(assets-theme/img/startup/contact.jpg) no-repeat; background-size:cover; background-position: center;">
  
  <div class="container">
    <div class="row">
    	<div class="col-12 text-center text-white">
    		<h1 class="text-white">
    			Get in Touch with Us
    		</h1>
    		<div class="u-h-4 u-w-50 bg-white rounded mx-auto my-4"></div>
    	</div>
    </div> <!-- END row-->
  </div> <!-- END container-->
</section> <!-- END intro-hero-->

<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 mx-auto text-center">
				<h2 class="h1">
					We Love To Hear From You
				</h2>
				<div class="u-h-4 u-w-50 bg-primary rounded mt-4 u-mb-40 mx-auto"></div>
				<p>
					You can contact us with anything related to our Products. We'll get in touch with you as soon as possible. 
				</p>
			</div>
		</div> <!-- END row-->
		<div class="row mt-5">
			<div class="col-lg-8 mx-auto text-center">
			<div id="msgholder"></div>
				<form  id="admin_form" method="post">
					<div class="row">
						<div class="col-md-6">
							<div class="input-group u-rounded-50 border u-of-hidden u-mb-30">
								<div class="input-group-addon bg-white border-0 pl-4 pr-0">
									<span class="icon icon-User text-primary"></span>
								</div>
								<input type="text" class="form-control border-0 p-3" name="name" value="<?php if ($user->logged_in) echo $user->name;?>" placeholder="Your name">
							</div>
						</div>
						<div class="col-md-6">
							<div class="input-group u-rounded-50 border u-of-hidden u-mb-30">
								<div class="input-group-addon bg-white border-0 pl-4 pr-0">
									<span class="icon icon-Mail text-primary"></span>
								</div>
								<input type="email" class="form-control border-0 p-3" name="email" value="<?php if ($user->logged_in) echo $user->email;?>" placeholder="Email address">
							</div>
						</div>
						<div class="col-md-6">
							<div class="input-group u-rounded-50 border u-of-hidden u-mb-30">
								  <input name="subject" class="form-control border-0 p-3"placeholder="Subject">
							</div>
						</div>
						<div class="col-md-6">
							<div class="input-group u-rounded-50 border u-of-hidden u-mb-30">
								<div class="input-group-addon bg-white border-0 pl-4 pr-0">
									<img src="lib/captcha.php" alt="" style="color:#36bea6" class="captcha-append" />
								</div>							
								<input class="form-control border-0 p-3" type="text" name="captcha" placeholder="Captcha code">
							</div>
						</div>
						
					</div>
					<textarea class="form-control u-rounded-15 p-3 u-mb-30" name="message" rows="4" placeholder="Youe text..."></textarea>
					<button class="btn btn-rounded btn-primary u-w-170" type="submit" name="doupdate">Submit</button>
					<div id="js-contact-result" data-success-msg="Success, We will get back to you soon" data-error-msg="Oops! Something went wrong"></div>
				</form>
			</div> <!-- END col-md-7 -->
		</div> <!-- END row-->	
	</div> <!-- END container-->
</section> <!-- END section-->

 <?php require_once("footer.php");?> 

	<div class="scroll-top bg-white box-shadow-v1">
	<i class="fa fa-angle-up" aria-hidden="true"></i>
	</div> 
	
	<script src="assets-theme/js/fury.js"></script>
	<script src="assets/js_/script.js"></script>
    <!-- Validate JS -->	

    <!-- Validate JS -->
    <script src="assets/js_/validate.js"></script>
    <!-- Contact JS -->
    <script src="assets/js_/contact.js"></script>

    <script src="assets/js_/popper.min.js"></script>
    <script src="assets/js_/bootstrap.min.js"></script>
	<script type="text/javascript">
	// <![CDATA[
	  function showResponse(msg) {
		  hideLoader();
		  if (msg == 'OK') {
			  result = "<div class=\"bggreen\"><p><span class=\"icon-ok-sign\"><\/span><i class=\"close icon-remove-circle\"></i><span>Thank you!<\/span>Your message has been sent successfully<\/p><\/div>";
			  $("#fullform").hide();
		  } else {
			  result = msg;
		  }
		  $(this).html(result);
		  $("html, body").animate({
			  scrollTop: 0
		  }, 600);
	  }
	  $(document).ready(function () {
		  var options = {
			  target: "#msgholder",
			  beforeSubmit: showLoader,
			  success: showResponse,
			  url: "ajax/sendmail.php",
			  resetForm: 0,
			  clearForm: 0,
			  data: {
				  processContact: 1
			  }
		  };
		  $("#admin_form").ajaxForm(options);
	  });
	// ]]>
	</script>
  </body>	

</html>