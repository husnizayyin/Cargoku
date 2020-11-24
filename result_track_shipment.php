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
  require_once("init.php"); 

  $ratesrow = $core->getTrack_post();
  
  $historyrow = $core->getTrack_post_history(); 

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
  <title>Track Shipment Result	| <?php echo $core->site_name;?></title>
  
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
	
	<link rel="stylesheet" type="text/css" href="assets-theme/main.css">
	<link rel="stylesheet" href="assets-theme/themify-icons.css">
	<!--[if lt IE 8]><!-->
	<link rel="stylesheet" href="assets-theme/ie7/ie7.css">
	
	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
	<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();   
	});
	</script>
	<style>
		ul.a {
			list-style-type: none;
		}
		
		/* Contenedor del popup */
		.popup {
			position: relative;
			display: inline-block;
			cursor: pointer;
		}

		/* pop-up actual */
		.popup .popuptext {
			visibility: hidden;
			width: 260px;
			background-color: #555;
			color: #fff;
			text-align: center;
			border-radius: 4px;
			padding: 8px 0;
			position: absolute;
			z-index: 1;
			bottom: 125%;
			left: 50%;
			margin-left: -130px;
		}
		
		.button4 {
			background-color: white;
			color: black;
			border: 2px solid #e7e7e7;
		}

		.button4:hover {background-color: #e7e7e7;}

		/* Muestra del Pop-up*/
		.popup .popuptext::after {
			content: "";
			position: absolute;
			top: 100%;
			left: 50%;
			margin-left: -5px;
			border-width: 5px;
			border-style: solid;
			border-color: #555 transparent transparent transparent;
		}

		/* Cambio para mostrar/ocultar el contenedor del pop-up */
		.popup .show {
			visibility: visible;
			-webkit-animation: fadeIn 1s;
			animation: fadeIn 1s
		}

		/* AnimaciĂ³n del pop-up */
		@-webkit-keyframes fadeIn {
			from {opacity: 0;} 
			to {opacity: 1;}
		}

		@keyframes fadeIn {
			from {opacity: 0;}
			to {opacity:1 ;}
		}
	</style>
	<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();   
	});
	</script>
	<script>
		function mostrarMensaje() {
			var popup = document.getElementById("myPopup");
			popup.classList.toggle("show");
		}
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
    		<h1 class="text-white">Track Shipment</h1>
    		<div class="u-h-4 u-w-50 bg-white rounded mx-auto my-4"></div>
    	</div>
    </div> <!-- END row-->
  </div> <!-- END container-->
</section> <!-- END intro-hero-->

<section class="pt-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="row justify-content-center">
					<div class="col-md-12">
					<?php if(!$ratesrow):?>

					<!--============================= TRACKING NOT FOUND =============================-->
					<section class="main-block">
						<div class="container-fluid">
							<div class="row justify-content-center align-items-center  mintrack-height-block" style="align='center'">
							<div class="col-md-12">
								<div class="confirmation-wrap">
									<?php echo "
									<i align='center' class='display-3 text-warning d-block'><img src='dashboard/assets/images/alert/ohh_shipment_rate.png' width='143' /></i>
									</br>
									<p style='font-size: 20px; -webkit-font-smoothing: antialiased; color: #737373;' align='center'>".$lang['track-shipment1']." <strong style='color:#FF0000;'>".$_POST['order_inv']."</strong> </p>	
									<p style='font-size: 18px; -webkit-font-smoothing: antialiased; color: #737373;' align='center'>".$lang['track-shipment2']."</p>
									",false;?>
									<a href="index.php" class="btn btn-outline-danger btn-confirmation" align='center'><?php echo $lang['track-shipment3'] ?></a>
								</div>
							</div>
							
							</div>
						</div>
					</section>
					<!--//END TRACKING NOT FOUND -->			
					<?php else:?>
					<?php foreach ($ratesrow  as $row):?>
						<div class="col-md-7">
							<div class="row">
								<div class="col-md-6">
									<div class="trackstatus-title">
										<span class="ti-package align-top" style="font-size: 30px;"></span> <h4><?php echo $row->status_courier;?></h4>
									</div>
								</div>
								<div class="col-md-6">
									<div class="trackstatus-title">
										<label><?php echo $lang['track-shipment4'] ?> <b><?php echo $row->order_inv;?></b></label>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-7">
								<form method="post">
									<!-- General Information -->
									<div class="payment-wrap">
										<div class="row">
											<div class="col-md-12">
												<div class="track-title">
													<h5 class="form_sub"><?php echo $lang['track-shipment5'] ?></h5>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="track-title">
												   <span class="ti-location-pin align-top" style="font-size: 30px;"></span>  <label><?php echo $lang['track-shipment6'] ?></br> <b><?php echo $row->country;?></b></label>
												</div>
											</div>
											<div class="col-md-6">
												<div class="track-title">
												   <span class="ti-location-pin align-top" style="font-size: 30px;"></span>  <label><?php echo $lang['track-shipment7'] ?></br> <b><?php echo $row->city;?></b></label>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="track-title">
												   <span class="ti-calendar align-top" style="font-size: 30px;"></span>  <label><?php echo $lang['track-shipment8'] ?></br> <b><?php echo $row->created;?></b></label>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<div class="track-title">
													<span class="ti-timer align-top" style="font-size: 30px;"></span>  <label><?php echo $lang['track-shipment9'] ?></br> <b><?php echo $row->r_hour;?></b></label>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="track-title">
													 <label><?php echo $lang['track-shipment20'] ?></br> <b><?php echo $row->s_name;?></b></label>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<div class="track-title">
													<span class="ti-direction-alt align-top" style="font-size: 30px;"></span>  <label><?php echo $lang['track-shipment10'] ?></br> <b><?php echo $row->address;?></b></label>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-4">
												<div class="track-title">
													 <label>S<?php echo $lang['track-shipment11'] ?></br> <b><?php echo $row->r_qnty;?></b></label>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<div class="track-title">
													  <label><?php echo $lang['track-shipment12'] ?></br> <b><?php echo $row->package;?></b></label>
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<div class="track-title">
													  <label><?php echo $lang['track-shipment13'] ?></br> <b><?php if ($row->r_weight > $row->v_weight) { echo  round_out($row->r_weight); } else { echo round_out($row->v_weight); }?></b></label>
													</div>
												</div>
											</div>
										</div>

									</div>
									<!--// General Information -->

									<!-- track shipment -->
									<div class="payment-wrap">
										<div class="row">
											<div class="col-md-12">
												 <div class="track-title">
													<h5 class="form_sub"><?php echo $lang['track-shipment15'] ?></h5>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="track-title">
												   <span class="ti-location-pin align-top" style="font-size: 30px;"></span>  <label><?php echo $lang['track-shipment16'] ?></br> <b><?php echo $row->r_dest;?></b></label>
												</div>
											</div>
											<div class="col-md-6">
												<div class="track-title">
												   <span class="ti-location-pin align-top" style="font-size: 30px;"></span>  <label><?php echo $lang['track-shipment17'] ?></br> <b><?php echo $row->r_city;?></b></label>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="track-title">
												  <span class="ti-calendar align-top" style="font-size: 30px;"></span>  <label><?php echo $lang['track-shipment18'] ?></br> <b><?php echo $row->collection_courier;?></b></label>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<div class="track-title">
													<span class="ti-timer align-top" style="font-size: 30px;"></span>  <label><?php echo $lang['track-shipment19'] ?></br> <b><?php echo $row->r_hour;?></b></label>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="track-title">
													 <label><?php echo $lang['track-shipment20'] ?></br> <b><?php echo $row->r_name;?></b></label>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<div class="track-title">
													<span class="ti-direction-alt align-top" style="font-size: 30px;"></span>  <label><?php echo $lang['track-shipment10'] ?></br> <b><?php echo $row->r_address;?></b></label>
													</div>
												</div>
											</div>
										</div>
									</div>
								</form>
								<!--// track shipment -->
							</div>
							<?php endforeach;?>
							<?php unset($row);?>
							<?php endif;?>
							
							<?php if(!$historyrow):?>
							<?php else:?>
							<div class="col-md-5">
								<div class="booking-summary_block">
									<div class="booking-summary-box">
									<h5><?php echo $lang['track-shipment22'] ?></h5>
									<?php foreach ($historyrow  as $rows):?>
										<div class="track-cost">			
											<ul class="timeline a">
											  <li class="event">
												<div class="row">
												  <div class="col-md-9">
													<p class="text-left"><?php echo $rows->t_date;?></p>
													<h6 class="text-left"><?php echo $rows->status_courier;?> - <?php echo $rows->t_dest;?>,<?php echo $rows->t_city;?></h6>
													<button class="popup button4" onclick="mostrarMensaje()">+ Comments
													  <span class="popuptext" id="myPopup"><?php echo $rows->comments;?></span>
													</button>
												  </div>
												  <div class="col-md-3">
													<p class="text-right"><?php echo $rows->t_hour;?></p>
													<h4></h4>
												  </div>
												</div>
											  </li>
											  <!--event schedule 1 end--> 
											</ul>										
										</div> 
									<?php endforeach;?>
									<?php unset($row);?>
									<?php endif;?>			
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div> <!-- END row-->
		</div>	 <!-- END container-->
	</div>
</section> <!-- END section--> 
			
		
       

<?php require_once("footer.php");?> 

	<div class="scroll-top bg-white box-shadow-v1">
		<i class="fa fa-angle-up" aria-hidden="true"></i>
	</div> 
	
	<script src="assets-theme/js/fury.js"></script>
	<script src="assets/js_/script.js"></script>
    <!-- Validate JS -->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="js/main.js"></script>

		
  </body>	
</html>