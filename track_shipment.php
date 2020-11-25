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
  <meta name="description" content="A complete landing page solution for any business">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!--Favicon-->
  <link rel="icon" href="uploads/favicon.png">
  
  <!-- Title-->
  <title>Track Shipment | <?php echo $core->site_name;?></title>
  
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

<section data-dark-overlay="6" data-init="parallax" class="u-py-30 u-pt-lg-200 u-pb-lg-50 u-flex-center" style=" background:url(assets-theme/img/booking/track.jpg) no-repeat; background-size:cover; background-position: center;">
  <div class="container">
    <div class="row">
    	<div class="col-12 text-center text-white">
    		<h1 class="text-white">Track Shipment</h1>
    		<div class="u-h-4 u-w-50 bg-white rounded mx-auto my-4"></div>
    	</div>
    </div> <!-- END row-->
  </div> <!-- END container-->
</section> <!-- END intro-hero-->

 <section>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="bg-white box-shadow-v1 rounded bg-white p-3 p-md-5">
					<h3 class="h2 text-center">
						WELCOME TO 24/7 DEPRIXA PRO LOGISTICS SERVICE
					</h3>
					<form class="form-inline justify-content-center my-5 subsribe-rounded" action="result_track_shipment.php" method="post">
						<div class="form-group">
							<input type="text" name="order_inv" class="form-control px-4 u-rounded-50 u-h-55" placeholder="shipping number Ej:(AWB-100000001)" required>
						</div>
						<button type="submit" name="submit" class="btn btn-rounded btn-primary u-h-55">
							Search Tracking
						</button>
					</form>
				</div>
			</div> <!-- END col-12-->
		</div> <!-- END row-->
	</div> <!-- END container-->
</section>
       

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