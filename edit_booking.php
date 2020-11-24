<?php


  define("_VALID_PHP", true);
  require_once("init.php");
  if (!$user->logged_in)
      redirect_to("login.php");
  
  
	$row = $user->getUserData();
	$courierrow = $core->getCouriercom();
	$packrow = $core->getPack();
	$payrow = $core->getPayment();
	$itemcatrow = $core->getItem();
	$moderow = $core->getShipmode();
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
  <title><?php echo $lang['langs_01079'] ?> | <?php echo $core->site_name;?></title>
  
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

<section data-dark-overlay="6" data-init="parallax" class="u-py-30 u-pt-lg-200 u-pb-lg-50 u-flex-center" style=" background:url(assets-theme/img/booking/edit_book.jpg) no-repeat; background-size:cover; background-position: center;">
  <div class="container">
    <div class="row">
    	<div class="col-12 text-center text-white">
    		<h1 class="text-white"><?php echo $lang['langs_01080'] ?></h1>
    		<div class="u-h-4 u-w-50 bg-white rounded mx-auto my-4"></div>
    	</div>
    </div> <!-- END row-->
  </div> <!-- END container-->
</section> <!-- END intro-hero-->

<section>
  <div class="container box-shadow-v1--onHover">
		<div id="msgholder"></div>
		<p class="lead">
			<h5 class="card-title"><?php echo $lang['edit-booking1'] ?> <b><?php echo $row->order_inv;?></b></h5>
		
			<?php echo $lang['edit-booking2'] ?> <b><?php echo $row->country;?>, <?php echo $row->city;?> <?php echo $row->postal;?></b>
		</p>
	   <div class="row align-items-center">
			<div class="col-lg-6 mt-0">		
			<!-- General Information -->
				<form id="admin_form" method="post">
				<h6 class="card-title"><?php echo $lang['create-booking4'] ?></h6>
					
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['langs_01081'] ?></label>
								<input type="text"name="r_name"  placeholder="<?php echo $lang['edit-booking4'] ?>" value="<?php echo $row->r_name;?>">
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['langs_01082'] ?></label>
								<input type="email" name="r_email" placeholder="<?php echo $lang['edit-booking5'] ?>" value="<?php echo $row->r_email;?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['langs_01083'] ?></label>
								<input type="text" name="r_address" placeholder="<?php echo $lang['edit-booking6'] ?>" value="<?php echo $row->r_address;?>">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['langs_01084'] ?></label>
								<input type="number" name="r_phone"  placeholder="<?php echo $lang['edit-booking7'] ?>" value="<?php echo $row->r_phone;?>">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['langs_01085'] ?></label>
								<input type="number" name="rc_phone" placeholder="<?php echo $lang['edit-booking8'] ?>" value="<?php echo $row->rc_phone;?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['langs_01086'] ?></label>
								<input type="text" name="r_dest" placeholder="<?php echo $lang['edit-booking9'] ?>" value="<?php echo $row->r_dest;?>">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['langs_01087'] ?></label>
								<input type="text" name="r_city" placeholder="<?php echo $lang['edit-booking10'] ?>" value="<?php echo $row->r_city;?>">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['langs_01088'] ?></label>
								<input type="text" name="r_postal" placeholder="<?php echo $lang['edit-booking11'] ?>" value="<?php echo $row->r_postal;?>">
							</div>
						</div>
					</div>
						
						
					<h6 class="card-title"><?php echo $lang['create-booking13'] ?></h6>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="inputlname" class="control-label col-form-label"><?php echo $lang['create-booking14'] ?> <i style="color:#ff0000" class="fa fa-cube"></i></label>
								<input type="text" name="package" placeholder="<?php echo $lang['edit-booking13'] ?>" value="<?php echo $row->package;?>" readonly>
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['create-booking15'] ?></label>
								<input type="text" name="courier" placeholder="<?php echo $lang['edit-booking14'] ?>" value="<?php echo $row->courier;?>" readonly>
							</div>
						</div>						
					</div>
					<div class="row">						
						<div class="col-md-6">
							<div class="form-group">
								<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['create-booking16'] ?></label>
								<input type="text" name="service_options" placeholder="<?php echo $lang['edit-booking15'] ?>" value="<?php echo $row->service_options;?>" readonly>
							</div>
						</div>	
						
						<div class="col-md-6">
							<div class="form-group">
								<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['create-booking17'] ?> <i style="color:#ff0000" class="fa fa-credit-card"></i></label>
								<input type="text" name="pay_mode" placeholder="<?php echo $lang['edit-booking16'] ?>" value="<?php echo $row->pay_mode;?>" readonly>
							</div>
						</div>	
					</div>
						
					<?php $track = $courier->order_track();?>
					<?php $prefix = $courier->order_prefix();?>
					<div class="row" style="display:none">
						<div class="col-md-6">
							<div class="form-group">
								<label class="input"> <i style="color:#ff0000"><?php echo $prefix;?></i>
								<input type="text" name="tracking" value="<?php echo $track;?>">	
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="inputEmail3" class="control-label col-form-label">Tax & Duty</label>
								<input type="number" onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();"  id="sum3" name="r_tax" value="<?php echo $core->tax;?>">		
							</div>
						</div>						
						<div class="col-md-6">
							<div class="form-group">
								<label for="inputEmail3" class="control-label col-form-label">Insurance</label>
								<input type="number" onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();" id="sum5" name="r_insurance" value="<?php echo $core->insurance;?>">		
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['create-booking18'] ?></label>
							  <input type="text" name="deli_time" Value="<?php if(isset($courier_detail)){echo  $courier_detail->deli_time;}?>" placeholder="2 - 5 working days">	
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label for="inputEmail3" class="control-label col-form-label">Status</label>
								 <input type="text" name="status_courier" value="<?php echo $row->status_courier;?>">	
							</div>
						</div>
					</div>
				</div>	
		   
				<div class="col-lg-6 mt-5">
					  <!-- General Information -->
					  </br>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
							<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['create-booking20'] ?></label>
								<input type="text" name="itemcat" value="<?php echo $row->itemcat;?>">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['create-booking21'] ?></label>
								<input type="number" data-toggle="tooltip" data-placement="bottom" title="Number of Packages" name="r_qnty" value="<?php echo $row->r_qnty;?>">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
							<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['create-booking22'] ?> (<b><?php if(isset($courier_detail)){echo  $courier_detail->typeweight;}?></b>)</label>
								<input type="number" data-toggle="tooltip" data-placement="bottom" title="Shipping Weight" onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();"  id="sum4" name="r_weight" value="<?php echo $row->r_weight;?>">
							</div>
						</div>							
					</div>
					<div class="row" >
						<div class="col-md-12">
							<div class="form-group">
								<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['create-booking23'] ?></label>
								<textarea class="form-control" rows="2" name="r_description" placeholder="<?php echo $lang['create-booking23'] ?>"><?php echo $row->r_description;?></textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="inputlname" class="control-label col-form-label"><?php echo $lang['create-booking24'] ?> <i class="ti-package" style="color:#36bea6"></i> <?php echo $lang['create-booking32'] ?> <b><i style="color:#FF0000" class="ti-help-alt" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['create-booking34'] ?> / <?php echo $core->meter;?> = kg"></i></b></label>
							</div>
						</div>
						
						<div class="col-md-3">
							<div class="form-group">
								<!-- input box for Length -->
								<input type="number" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['create-booking25'] ?>"  onblur="if(this.value == ''){this.value='0'}"  onKeyUp="suma();" id="l1" name="length" value="<?php echo $row->length;?>">
							</div>
						</div>
						<div class="cross strong text__color-gray-darker text__size-smaller">&nbsp; x &nbsp;</div>
						
						<div class="col-md-3">
							<div class="form-group">
								<!-- input box for width -->
								<input type="number" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['create-booking26'] ?>" onblur="if(this.value == ''){this.value='0'}"  onKeyUp="suma();" id="w2" name="width" value="<?php echo $row->width;?>">
							</div>
						</div>
						<div class="cross strong text__color-gray-darker text__size-smaller">&nbsp; x &nbsp;</div>
						
						<div class="col-md-3">
							<div class="form-group">
								<!-- input box for height -->
								<input type="number" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['create-booking27'] ?>" onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();" id="h3" name="height" value="<?php echo $row->height;?>">
								<input type="number" class="form-control" id="vol" value="0" name="v_weight" style="display:none">
							</div>
						</div>
						

						<div class="col-md-6">
							<div class="form-group">
								<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['create-booking28'] ?> <b><i style="color:#FF0000" class="ti-help-alt" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['create-booking33'] ?> <?php echo $core->insurance;?> Insurance"></i></b></label>
								<input type="number" onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();" id="sum2" name="r_custom" value="<?php echo $row->r_custom;?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							<label for="inputname" class="control-form-label"><?php echo $lang['create-booking29'] ?></label>
								<input type="text"  name="r_curren" value="<?php echo $row->r_curren;?>" readonly>
							</div>
						</div>
					</div>
					<hr class="m-t-0 m-b-5">
						
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['create-booking30'] ?> &nbsp; <b><?php echo $core->currency;?></b></label>
								<input type="text" data-toggle="tooltip" data-placement="top" title="Total value of the shipment" class="form-control" name="r_costtotal" id="total_result" value="<?php echo $row->r_costtotal;?>" readonly>
							</div>
						</div>
						<!--/span-->
					</div>
					
					<div class="row">
						<div class="col md-12">
							<button class="btn btn-outline-primary btn-confirmation" name="dosubmit" type="submit"><span><i class="fa fa-check"></i></span>&nbsp; <?php echo $lang['edit-booking36'] ?></button>
							<a  href="booking_list.php" class="btn btn-outline-white btn-confirmation"><span><i class="fa fa-reply-all"></i></span>&nbsp; <?php echo $lang['langs_01089'] ?></a>
						</div>
					</div>
						
					<input name="id" type="hidden" value="<?php echo Filter::$id;?>" />
				</form>
				<?php echo Core::doForm("processBooking","ajax/controller.php");?> 
			</div>
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
	
	<script type="text/javascript">

			function suma(){
				
				<!--General sale formula-->
				var num2 = "5.56789";
				var sum2 = document.getElementById("sum2");
				var sum3 = document.getElementById("sum3");
				var sum4 = document.getElementById("sum4");
				var sum5 = document.getElementById("sum5");
				
				<!--VOLUMETRIC WEIGHT-->
				var l1 = document.getElementById("l1");
				var w2 = document.getElementById("w2");
				var h3 = document.getElementById("h3");

				var input = document.getElementById("total_result");
				
				<!--Formula Values-->
				var volumetric = <?php echo $core->meter;?>;
				var pound_weight_price = <?php echo $core->value_weight;?>;
				var percent = 100;

				var total_insurance = sum2.value * sum5.value/percent; 									<!--Tax on the value of the article-->
				var total_metric = l1.value * w2.value * h3.value/volumetric * pound_weight_price; 		<!--Volumetric weight result-->
				var total_weight = pound_weight_price * sum4.value; 									<!--Shipping weight value-->	
				
				var calculate_weight;
				if (total_weight > total_metric) {
					calculate_weight = total_weight;
				} else {
					calculate_weight = total_metric;
				}
				
				var total_tax = (calculate_weight + total_insurance) * sum3.value/percent; 	<!--Total sales tax-->
				
				total_result = parseFloat(parseFloat(total_insurance)  +  parseFloat(calculate_weight) + parseFloat(total_tax)) .toFixed(2); <!--Total result formula-->
				
				input.value= total_result;

			}
			
	</script>
	
	<script src="assets-theme/js/fury.js"></script>
	<script src="assets/js_/script.js"></script>
    <!-- Validate JS -->
    <script src="assets/js_/validate.js"></script>
    <!-- Contact JS -->
    <script src="assets/js_/contact.js"></script>

    <script src="assets/js_/popper.min.js"></script>
    <script src="assets/js_/bootstrap.min.js"></script>

		
  </body>	
</html>