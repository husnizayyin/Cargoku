<?php
// *************************************************************************
// *                                                                       *
// * DEPRIXA -  Integrated Web system                                      *
// * Copyright (c) JAOMWEB. All Rights Reserved                            *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * Email: osorio2380@yahoo.es                                            *
// * Website: http://www.jaom.info                                         *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * This software is furnished under a license and may be used and copied *
// * only  in  accordance  with  the  terms  of such  license and with the *
// * inclusion of the above copyright notice.                              *
// * If you Purchased from Codecanyon, Please read the full License from   *
// * here- http://codecanyon.net/licenses/standard                         *
// *                                                                       *
// *************************************************************************
  
  define("_VALID_PHP", true);
  require_once("../init.php");
?>
<?php
  if ($user->is_Admin())
      redirect_to("index.php");
	  
  if (isset($_POST['submit']))
      : $result = $user->login($_POST['username'], $_POST['password']);
  //Login successful 
  if ($result)
      : redirect_to("index.php");
  endif;
  endif;

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $lang['tools-login1'] ?> | <?php echo $core->site_name ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="shortcut icon" href="../uploads/favicon.png">
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/login/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/animate/animate.css">	
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/animsition/css/animsition.min.css">

	<link rel="stylesheet" type="text/css" href="assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/login/css/main.css">
	<link href="../assets/css_log/login.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/jquery-ui.js"></script>
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" id="admin_form" name="admin_form" method="post" action="#">
					<span class="login100-form-title p-b-48">
						<img src="assets/images/logo-text.png" alt="logo" />
					</span>
					<span class="login100">
					 <h5><i class="icon-lock icon-1x"></i> <?php echo $lang['tools-login2'] ?><span></span></h5>
					 </span>
					<div class="wrap-input100">
						<input class="input100" type="text" name="username">
						<span class="focus-input100" data-placeholder="<?php echo $lang['tools-login3'] ?>"></span>
					</div>

					<div class="wrap-input100">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="<?php echo $lang['tools-login4'] ?>"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="submit">
								<?php echo $lang['tools-login5'] ?>
							</button>
						</div>
					</div>

					<div class="text-center p-t-115">
						<span class="txt2">
							<?php echo $lang['tools-login6'] ?>
						</span>

						<a class="txt2" href="../register.php">
							<?php echo $lang['tools-login7'] ?>
						</a>
						|
						<a class="txt2" href="../index.php">
							<?php echo $lang['tools-login8'] ?>
						</a>
						</br>
						<div id="message-box"><?php print Filter::$showMsg;?></div>
					</div>
				</form>
			</div>
				
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="assets/login/vendor/animsition/js/animsition.min.js"></script>
	<script src="assets/login/vendor/bootstrap/js/popper.js"></script>
	<script src="assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="assets/login/js/main.js"></script>

</body>
</html>