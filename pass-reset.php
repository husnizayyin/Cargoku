<?php

  define("_VALID_PHP", true);
  require_once("init.php");
  
  if ($user->logged_in)
      redirect_to("dashboard/account.php");
  
	  
  if (isset($_POST['doLogin']))
      : $result = $user->login($_POST['username'], $_POST['password']);
  
  /* Login Successful */
  if ($result)
      : redirect_to("dashboard");
  endif;
  endif;
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
  <title><?php echo $lang['langs_010106'] ?> | <?php echo $core->site_name;?></title>
  
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
	<script src="assets/js/modernizr.mq.js" type="text/javascript" ></script>
	<script src="assets/js/checkbox.js"></script>
  
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


<section data-dark-overlay="5" class="u-h-100vh u-flex-center" style="background:url(assets-theme/img/login/bg-1_1.jpg) no-repeat; background-size:cover; background-position: top center;">
  <div class="container">
   
    <div class="row">
    	<div class="col-lg-5 m-auto text-center">
			 <div class="card box-shadow-v2 bg-white u-of-hidden">
			 	<h2 class="bg-primary m-0 py-3 text-white"><?php echo $lang['langs_010107'] ?></h2>
			 		<div id="show-passreset" class="p-4 p-md-5">
					<?php include("div_loader.php");?>
					<div id="msgholder2"><?php print Filter::$showMsg;?></div>
					<form id="admin_form" method="post">

						<div class="input-group u-rounded-50 border u-of-hidden u-mb-20">
							<div class="input-group-addon bg-white border-0 pl-4 pr-0">
								<span class="icon icon-User text-primary"></span>
							</div>
							<input type="text" class="form-control border-0 p-3" name="uname" placeholder="Username">
						</div>
						<div class="input-group u-rounded-50 border u-of-hidden u-mb-20">
							<div class="input-group-addon bg-white border-0 pl-4 pr-0">
								<span class="icon icon-Mail text-primary"></span>
							</div>
							<input type="text" class="form-control border-0 p-3" name="email" placeholder="Email address">
						</div>
						<div class="input-group u-rounded-50 border u-of-hidden u-mb-20">
							<div class="input-group-addon bg-white border-0 pl-4 pr-0">
								<span class="icon icon-ClosedLock text-primary"></span>
								<img src="lib/captcha.php" alt="" class="captcha-append" />
							</div>
							<input type="text" class="form-control border-0 p-3" name="captcha" placeholder="Captcho code">
						</div>


						<button type="submit" name="dosubmit" class="btn btn-primary btn-rounded u-mt-20 u-w-170">
							<?php echo $lang['langs_010108'] ?>
						</button>
						
					</form>
					<?php echo Core::doForm("passReset","ajax/user.php");?>
					</br>
					<p>
						<?php echo $lang['langs_010109'] ?> </br><?php if($core->reg_allowed):?><a href="sign-up.php" class="text-primary"><?php echo $lang['langs_010110'] ?></a><?php endif;?> | <a href="login.php" class="text-primary"><?php echo $lang['langs_010111'] ?></a>
					</p>
			 		</div> <!-- END p-4 p-md-5-->
			 </div>  <!-- END card-->
     </div> <!-- END col-lg-5-->
    </div> <!-- END row-->
  </div> <!-- END container-->

</section> <!-- END intro-hero-->


	<script src="assets-theme/js/fury.js"></script>
    <script src="assets/js_/bootstrap.min.js"></script>
	
</body>

</html>
