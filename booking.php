<?php


  define("_VALID_PHP", true);
  require_once("init.php");
  if (!$user->logged_in){
  
        //method get 
        $coruer_id  = 	$_GET['id'];
        $weight 	=  	$_GET['weight'];
        $lenght 	=  	$_GET['length'];
        $width 		=   $_GET['width'];
        $height 	=  	$_GET['height'];
		$type 		=  	$_GET['type'];
        $scountry 	=  	$_GET['scountry'];
          
        redirect_to("login_booking.php?cid=$coruer_id&weight=$weight&length=$lenght&height=$height&width=$width&type=$type&scountry=$scountry");
  
  }
	$row = $user->getUserData();
        
        if(isset($_GET['id'])){
              $courier_detail = $core->preAutoFiled($_GET['id']); 
        }
  
  
	$row = $user->getUserData();
	$courierrow = $core->getCouriercom();
	$packrow = $core->getPack();
	$payrow = $core->getPayment();
	$itemcatrow = $core->getItem();
	$moderow = $core->getShipmode();
	
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
  <title><?php echo $lang['langs_01054'] ?> | <?php echo $core->site_name;?></title>
  
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
<?php $itemrow = $core->getItem(); ?>
<?php $moderow = $core->getShipmode();?>
<section class="u-py-20 u-pt-lg-200 u-pb-lg-50 u-flex-center box-shadow-v2" style="
  background: #8B3AC6;
  background-image: -webkit-linear-gradient(left, #8B3AC6 0%, #4D3399 100%);
  background-image: -o-linear-gradient(left, #8B3AC6 0%, #4D3399 100%);
  background-image: -webkit-gradient(linear, left top, right top, from(#8B3AC6), to(#4D3399));
  background-image: linear-gradient(to right, #8B3AC6 0%, #4D3399 100%);
  background-repeat: repeat-x;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#FF8B3AC6', endColorstr='#FF4D3399', GradientType=1);
  ">
  <div class="container">
    <div class="row">
    	<div class="col-12 text-center text-white">
    		<h1 class="text-white"><?php echo $lang['langs_01055'] ?></h1>
    		<div class="u-h-4 u-w-50 bg-white rounded mx-auto my-4"></div>
    	</div>
    </div> <!-- END row-->
  </div> <!-- END container-->
</section> <!-- END intro-hero-->

<section>
  <div class="container box-shadow-v1--onHover">
		</br>
		<div id="msgholder"></div>
		<p class="lead">
			<?php echo $lang['create-booking1'] ?> <b><?php echo $row->country;?>, <?php echo $row->city;?> <?php echo $row->postal;?></b>
		</p>
	   <div class="row align-items-center">
			<div class="col-lg-6 mt-5">		
			<!-- General Information -->
				<form id="admin_form" method="post">
				<h6 class="card-title"><?php echo $lang['create-booking4'] ?></h6>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" name="username" value="<?php echo $user->username;?>" placeholder="<?php echo $lang['create-booking2'] ?>" readonly>
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<input type="text"  name="s_name" value="<?php echo $row->fname;?> <?php echo $row->lname;?>" placeholder="<?php echo $lang['create-booking3'] ?>" readonly>
							</div>
						</div>
					</div>
					<div class="row" style="display:none">
						<div class="col-md-4">
							<div class="form-group">
								<input type="text" name="alamat" value="<?php echo $row->address;?>" placeholder="Alamat">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<input type="text" name="phone" value="<?php echo $row->code_phone;?><?php echo $row->phone;?>" placeholder="Phone">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<input type="text" name="country" value="<?php echo $row->country;?>" placeholder="Country">
							</div>
						</div>
					</div>
					<div class="row" style="display:none">
						<div class="col-md-4">
							<div class="form-group">
								<input type="text" name="Kota" value="<?php echo $row->city;?>" placeholder="Kota">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<input type="text" name="postal" value="<?php echo $row->postal;?>" placeholder="Postal Code">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<input type="text" name="email" value="<?php echo $row->email;?>" placeholder="Email">
							</div>
						</div>					
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" name="r_name"  placeholder="<?php echo $lang['create-booking5'] ?>">
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<input type="email" name="r_email" placeholder="<?php echo $lang['create-booking6'] ?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<input type="text" name="r_address" placeholder="<?php echo $lang['create-booking7'] ?>">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<input type="number" name="r_phone"  placeholder="<?php echo $lang['create-booking8'] ?>">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<input type="number" name="rc_phone" placeholder="<?php echo $lang['create-booking9'] ?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<input type="text" name="r_dest" value="<?php if(isset($_GET['scountry'])){ echo $_GET['scountry'];}?>" placeholder="<?php echo $lang['create-booking10'] ?>" readonly="ReAdOnLy">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<input type="text" name="r_city" placeholder="<?php echo $lang['create-booking11'] ?>">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<input type="text" name="r_postal" placeholder="<?php echo $lang['create-booking12'] ?>">
							</div>
						</div>
					</div>
						
						
					<h6 class="card-title"><?php echo $lang['create-booking13'] ?></h6></br>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="inputlname" class="control-label col-form-label"><?php echo $lang['create-booking14'] ?> <i style="color:#ff0000" class="fa fa-cube"></i></label>
								<input type="text" name="package" value="<?php if(isset($_GET['type'])){echo $_GET['type'];} ?>" readonly>
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['create-booking15'] ?></label>
								<input type="text" name="courier" value="<?php if(isset($courier_detail)){echo $courier_detail->services;} ?>" readonly>
							</div>
						</div>						
					</div>
					<div class="row" style="display:none">						
						<div class="col-md-6">
							<div class="form-group">
								<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['create-booking17'] ?> <i style="color:#ff0000" class="fa fa-credit-card"></i></label>
								<input type="text" name="pay_mode" value="Credit Card">
							</div>
						</div>	
					</div>
						
					<?php $track = $courier->order_track();?>
					<?php $prefix = $courier->order_prefix();?>
					<div class="row">
						<div class="col-md-6" style="display:none">
							<div class="form-group">
								<label class="input"> <i style="color:#ff0000"><?php echo $prefix;?></i>
								<input type="text" name="tracking" value="<?php echo $track;?>">	
							</div>
						</div>
						<div class="col-md-6" style="display:none">
							<div class="form-group">
								<label for="inputEmail3" class="control-label col-form-label">Tax & Duty</label>
								<input type="number" onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();"  id="sum3" name="r_tax" value="<?php echo $core->tax;?>">		
							</div>
						</div>						
						<div class="col-md-6" style="display:none">
							<div class="form-group">
								<label for="inputEmail3" class="control-label col-form-label">Insurance</label>
								<input type="number" onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();" id="sum5" name="r_insurance" value="<?php echo $core->insurance;?>">		
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['create-booking16'] ?></label>
								<input type="text" name="service_options" placeholder="Select Shipping Mode" list="browsers3" autocomplete="off" required="required">
								<datalist id="browsers3">
									<?php foreach ($moderow as $row):?>
									<option value="<?php echo $row->ship_mode; ?>"><?php echo $row->ship_mode; ?></option>
									<?php endforeach;?>
								</datalist>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['create-booking18'] ?></label>
							  <input type="text" name="deli_time" Value="<?php if(isset($courier_detail)){echo  $courier_detail->deli_time;}?>" placeholder="2 - 5 working days">	
							</div>
						</div>
						
						<div class="col-md-6" style="display:none">
							<div class="form-group">
								<label for="inputEmail3" class="control-label col-form-label">Status</label>
								 <input type="text" name="status_courier" value="Pending">	
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
								<input type="text" name="itemcat" placeholder="Select Item Category" list="browsers4" autocomplete="off" required="required">
								<datalist id="browsers4">
									<?php foreach ($itemrow as $row):?>
									<option value="<?php echo $row->name_item; ?>"><?php echo $row->name_item; ?></option>
									<?php endforeach;?>
								</datalist>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['create-booking21'] ?></label>
								<input type="number" data-toggle="tooltip" data-placement="bottom" title="Number of Packages" name="r_qnty">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
							<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['create-booking22'] ?> (<b><?php if(isset($courier_detail)){echo  $courier_detail->typeweight;}?></b>)</label>
								<input type="number" data-toggle="tooltip" data-placement="bottom" title="Shipping Weight" class="form-control" onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();"  id="sum4" name="r_weight" value="<?php echo $_GET['weight'];?>" readonly>
							</div>
						</div>							
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['create-booking23'] ?></label>
								<textarea class="form-control" rows="2" name="r_description" placeholder="<?php echo $lang['create-booking23'] ?>"></textarea>
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
								<input type="number" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['create-booking25'] ?>" class="form-control" onblur="if(this.value == ''){this.value='0'}"  onKeyUp="suma();" id="l1" name="length" value="<?php echo $_GET['length'];?>" readonly>
							</div>
						</div>
						<div class="cross strong text__color-gray-darker text__size-smaller">&nbsp; x &nbsp;</div>
						
						<div class="col-md-3">
							<div class="form-group">
								<!-- input box for width -->
								<input type="number" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['create-booking26'] ?>" class="form-control" onblur="if(this.value == ''){this.value='0'}"  onKeyUp="suma();" id="w2" name="width" value="<?php echo $_GET['width'];?>" readonly>
							</div>
						</div>
						<div class="cross strong text__color-gray-darker text__size-smaller">&nbsp; x &nbsp;</div>
						
						<div class="col-md-3">
							<div class="form-group">
								<!-- input box for height -->
								<input type="number" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['create-booking27'] ?>" class="form-control" onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();" id="h3" name="height" value="<?php echo $_GET['height'];?>" readonly>
								<input type="number" class="form-control" id="vol" value="0" name="v_weight" style="display:none">
							</div>
						</div>
						

						<div class="col-md-6">
							<div class="form-group">
								<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['create-booking28'] ?> <b><i style="color:#FF0000" class="ti-help-alt" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['create-booking33'] ?> <?php echo $core->insurance;?> Insurance"></i></b></label>
								<input type="number" onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();" id="sum2" name="r_custom" value="0">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							<label for="inputname" class="control-form-label"><?php echo $lang['create-booking29'] ?></label>
								<input type="text"  name="r_curren" value="USD" readonly>
							</div>
						</div>
					</div>
					<hr class="m-t-0 m-b-5">
						
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['create-booking30'] ?> &nbsp; <b><?php echo $core->currency;?></b></label>
								<input type="text" data-toggle="tooltip" data-placement="top" title="Total value of the shipment" class="form-control" name="r_costtotal" id="total_result" value="<?php if(isset($courier_detail)){echo  $courier_detail->rate;}?>" readonly>
							</div>
						</div>
						<!--/span-->
					</div>
						
					<footer>
						<div class="row">
							<div class="col md-8">
								<button class="btn btn-outline-primary btn-confirmation" name="dosubmit" type="submit"><?php echo $lang['create-booking31'] ?><span><i class="icon-ok"></i></span></button>
							</div>
						</div>
					</footer>
					<input name="doRegister_online" type="hidden" value="1" />
				</form>
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
			
	<script type="text/javascript">
	// <![CDATA[
	  function showResponse(msg) {
		  hideLoader();
		  if (msg == 'OK') {
			  result = "<div class=\"bggreen\"><p><span class=\"icon-ok-sign\"><\/span><i class=\"close icon-remove-circle\"></i><span>Success!<\/span>You have successfully registered. Please check your email for further information<\/p><\/div>";
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
			  url: "ajax/user.php",
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