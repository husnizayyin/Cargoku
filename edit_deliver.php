<?php

  define("_VALID_PHP", true);
  require_once("init.php");
  if (!$user->logged_in)
      redirect_to("login.php");
  
  
	$row = $user->getUserData();
	$row = Core::getRowById(Core::cTable, Filter::$id);
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
  <title><?php echo $lang['langs_01094'] ?> | <?php echo $core->site_name;?></title>
  
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
	<link rel="stylesheet" type="text/css" href="dashboard/assets/libs/pickadate/lib/themes/default.css">
    <link rel="stylesheet" type="text/css" href="dashboard/assets/libs/pickadate/lib/themes/default.date.css">
	
	<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();   
	});
	</script>

	
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

<section data-dark-overlay="6" data-init="parallax" class="u-py-30 u-pt-lg-200 u-pb-lg-50 u-flex-center" style=" background:url(assets-theme/img/booking/deliver_package.jpg) no-repeat; background-size:cover; background-position: center;">
  <div class="container">
    <div class="row">
    	<div class="col-12 text-center text-white">
    		<h1 class="text-white"><?php echo $lang['langs_01095'] ?></h1>
    		<div class="u-h-4 u-w-50 bg-white rounded mx-auto my-4"></div>
    	</div>
    </div> <!-- END row-->
  </div> <!-- END container-->
</section> <!-- END intro-hero-->

<section>
  <div class="container box-shadow-v1--onHover">
		<div id="msgholder"></div>
	   <div class="row align-items-center">
			<div class="col-lg-12 mt-0">		
			<!-- General Information -->
				<form class="xform" id="admin_form" method="post">
					<header>
					<h4 class="modal-title"><?php echo $lang['deliver-ship2'] ?> <?php echo $row->order_inv;?> </h4> <?php echo $lang['deliver-ship3'] ?> <?php echo $row->r_dest;?> | <?php echo $row->r_address;?></header>
					<div class="row"> 										
						
						<div class="col-sm-12 col-md-4">
							<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['deliver-ship4'] ?></label>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<span style="color:#ff0000" class="ti-calendar"></span>
									</span>
								</div>
								<input type="text" class="form-control pickadate" name="deliver_date" placeholder="mm/dd/yyyy">
							</div>
						</div>

						<div class="col-sm-12 col-md-4">
							<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['deliver-ship5'] ?></label>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i class="ti-timer"></i></span>
								</div>
								<input class="form-control" name="delivery_hour" value="<?php date_default_timezone_set("".$core->timezone.""); echo "" . date("h:i:sa"); ?>">
							</div>
						</div>
					</div>
					<div class="row">
						
						<div class="col-sm-12 col-md-4">
							<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['deliver-ship6'] ?></label>
							<input class="form-control" name="person_receives" value="<?php echo $row->person_receives;?>" placeholder="<?php echo $lang['deliver-ship6'] ?>">
						</div>
						<div class="col-sm-12 col-md-4">
							<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['deliver-ship7'] ?></label>
							<div class="input-group mb-3">
								<input class="form-control" name="name_employee" value="<?php echo $row->name_employee;?>" placeholder="<?php echo $lang['deliver-ship7'] ?>">
							</div>
						</div>
					
						<div class="col-sm-12 col-md-2" style="display:none">
							<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['deliver-ship8'] ?></label>
							<input class="form-control" name="status_courier" value="Delivered" placeholder="<?php echo $lang['deliver-ship8'] ?>">
						</div>
						<div class="col-sm-12 col-md-2" style="display:none">
							<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['deliver-ship9'] ?></label>
							<input class="form-control" name="act_status" value="2" placeholder="<?php echo $lang['deliver-ship9'] ?>">
						</div>
						<div class="col-sm-12 col-md-4">
							<div class="input-group mb-3">
								<img src='dashboard/assets/images/alert/deliver.png' width='159' />
							</div>
						</div>						
					</div>
					</br>
					<footer>						
						<button class="btn btn-outline-primary btn-confirmation" name="dosubmit" type="submit"><span><i class="fa fa-check"></i></span>&nbsp; <?php echo $lang['langs_01096'] ?></button>
						<a  href="deliveries_list.php" class="btn btn-outline-white btn-confirmation"><span><i class="fa fa-reply-all"></i></span>&nbsp; <?php echo $lang['langs_01097'] ?></a>
					
					</footer>
					<input name="id" type="hidden" value="<?php echo Filter::$id;?>" />									
				</form>
			</div>	
		   

			
				<?php echo Core::doForm("processDeliver","ajax/controller.php");?> 
	
		</div>

	   <hr class="u-my-60">

	</div> <!-- END container-->
</section> <!-- END section-->
       

<?php require_once("footer.php");?> 

	<div class="scroll-top bg-white box-shadow-v1">
		<i class="fa fa-angle-up" aria-hidden="true"></i>
	</div> 
	
	<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();   
	});
	</script>
	
	<script src="assets-theme/js/fury.js"></script>
	<script src="assets/js_/script.js"></script>
    <!-- Validate JS -->
    <script src="assets/js_/validate.js"></script>
    <!-- Contact JS -->
    <script src="assets/js_/contact.js"></script>

    <script src="assets/js_/popper.min.js"></script>
    <script src="assets/js_/bootstrap.min.js"></script>
	
	<script src="dashboard/assets/libs/pickadate/lib/compressed/picker.js"></script>
	<script src="dashboard/assets/libs/pickadate/lib/compressed/picker.date.js"></script>
	<script src="dashboard/assets/libs/pickadate/lib/compressed/legacy.js"></script>
	<script src="dashboard/assets/libs/moment/moment.js"></script>
	<script src="dashboard/dist/js/pages/forms/datetimepicker/datetimepicker.init.js"></script>

		
  </body>	
</html>