<?php

  define("_VALID_PHP", true);
  require_once("init.php");
  
  if ($user->logged_in)
      redirect_to("account.php");

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
  <title><?php echo $lang['langs_01047'] ?> | <?php echo $core->site_name;?></title>
  
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
    			<?php echo $lang['langs_01048'] ?>
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
				<p>
					<?php echo $lang['langs_01049'] ?>
				</p>
			</div>
		</div> <!-- END row-->
		<div class="row mt-5">
			<div class="col-lg-8 mx-auto text-center">
			<div id="msgholder"></div>
				<form class="xform" id="admin_form" method="post">
				  <div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<input type="text" name="email" placeholder="<?php echo $lang['langs_01050'] ?>">
						</div>
						 <div class="note note-error"><?php echo $lang['langs_01050'] ?></div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">
							<input type="text" name="token" placeholder="<?php echo $lang['langs_01051'] ?>n">
						</div>
						 <div class="note note-error"><?php echo $lang['langs_01051'] ?></div>
					</div>
				  </div>
				  </br></br>
				  <footer>
					<button class="btn btn-outline-primary btn-confirmation" name="dosubmit" type="submit"><?php echo $lang['langs_01052'] ?><span><i class="icon-ok"></i></span></button>
					<a href="index.php?do=index" class="btn btn-outline-secondary btn-confirmation"><?php echo $lang['langs_01053'] ?></a> </footer>
				</form>
				<?php echo Core::doForm("accActivate","ajax/user.php");?>
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
  </body>	

</html>