<?php


 define("_VALID_PHP", true);
  require_once("init.php");
  
   $cid 		=  $_GET['cid'];
   $weight 		=  $_GET['weight'];
   $lenght 		=  $_GET['length'];
   $width 		=  $_GET['width'];
   $height 		=  $_GET['height'];
   $type 		=  $_GET['type'];
   $scountry 	=  $_GET['scountry'];
   
  if (isset($_POST['doLogin']))
      : $result = $user->login($_POST['username'], $_POST['password']);
  
  /* Login Successful */
  if ($result)
     :redirect_to("booking.php?id=$cid&weight=$weight&length=$lenght&height=$height&width=$width&type=$type&scountry=$scountry");
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
  <title>Login Booking | <?php echo $core->site_name;?></title>
  
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


<section data-dark-overlay="5" class="u-h-100vh u-flex-center" style="background:url(assets-theme/img/login/bg-1_1.jpg) no-repeat; background-size:cover; background-position: top center;">
  <div class="container">
   
    <div class="row">
    	<div class="col-lg-5 m-auto text-center">
			 <div class="card box-shadow-v2 bg-white u-of-hidden">
			 	<h2 class="bg-primary m-0 py-3 text-white"><?php echo $lang['langs_01099'] ?></h2>
			 		<div class="p-4 p-md-5">
			 		<div id="msgholder2"><?php print Filter::$showMsg;?></div>
						<form method="post" id="login_form" name="login_form">

							<div class="input-group u-rounded-50 border u-of-hidden u-mb-20">
								<div class="input-group-addon bg-white border-0 pl-4 pr-0">
									<span class="icon icon-User text-primary"></span>
								</div>
								<input type="text" class="form-control border-0 p-3" name="username" placeholder="<?php echo $lang['langs_010100'] ?>">
							</div>

							<div class="input-group u-rounded-50 border u-of-hidden u-mb-20">
								<div class="input-group-addon bg-white border-0 pl-4 pr-0">
									<span class="icon icon-ClosedLock text-primary"></span>
								</div>
								<input type="password" class="form-control border-0 p-3" name="password" placeholder="*************">
							</div>
								<div class="d-flex justify-content-between align-items-center">
									<label class="custom-control custom-checkbox text-left">
										<input type="checkbox" class="custom-control-input">
										<span class="custom-control-indicator mt-1"></span>
										<span class="custom-control-description"><?php echo $lang['langs_010101'] ?></span>
									</label>
									<a id="do-passreset" href="pass-reset.php"><?php echo $lang['langs_010102'] ?></a>
								</div>
								<button name="dosubmit" class="btn btn-primary btn-rounded u-mt-20 u-w-170">
									<?php echo $lang['langs_010103'] ?>
								</button>
								<input name="doLogin" type="hidden" value="1" />
						</form>
					</br>
					<p>
						<?php echo $lang['langs_010104'] ?> <?php if($core->reg_allowed):?><a href="sign-up.php" class="text-primary"><?php echo $lang['langs_010105'] ?></a><?php endif;?>
					</p>
			 		</div> <!-- END p-4 p-md-5-->
			 </div>  <!-- END card-->
     </div> <!-- END col-lg-5-->
    </div> <!-- END row-->
  </div> <!-- END container-->

</section> <!-- END intro-hero-->

	
	<script src="assets-theme/js/bundle.js"></script>
	<script src="assets-theme/js/fury.js"></script>
	
</body>

</html>
