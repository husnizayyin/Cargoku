<?php

  define("_VALID_PHP", true);
  require_once("init.php"); 
  include_once 'lib/BookingClass.php';
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
  <title><?php echo $lang['langs_01060'] ?> | <?php echo $core->site_name;?></title>
  
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
	
	<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();   
	});
	</script>
	<style type="text/css">
	.badge1 {
		position:relative;
	}
	.badge1[data-badge]:after {
		content:attr(data-badge);
		position:absolute;
		top:-10px;
		right:-10px;
		font-size:.6em;
		background:#F64D62;
		color:white;
		width:16px;height:16px;
		text-align:center;
		line-height:16px;
		border-radius:50%;
		box-shadow:0 0 4px #333;
	}
    </style>

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

<section data-dark-overlay="6" data-init="parallax" class="u-py-30 u-pt-lg-200 u-pb-lg-50 u-flex-center" style=" background:url(assets-theme/img/booking/head.jpg) no-repeat; background-size:cover; background-position: center;">
  <div class="container">
    <div class="row">
    	<div class="col-12 text-center text-white">
    		<h1 class="text-white"><?php echo $lang['langs_01061'] ?></h1>
    		<div class="u-h-4 u-w-50 bg-white rounded mx-auto my-4"></div>
    	</div>
    </div> <!-- END row-->
  </div> <!-- END container-->
</section> <!-- END intro-hero-->

<section>
   	<div class="container">
 		<div class="row">
 			<div class="col-12">
			<div class="tab-content">
				<table class="table table-responsive text-center text-md-left">
					<thead class="bg-secondary border-0 text-white">
						<tr>
							<th scope="col" class="text-center text-md-left"><?php echo $lang['langs_01062'] ?></th>
							<th scope="col" class="text-center text-md-left"><?php echo $lang['langs_01063'] ?></th>
							<th scope="col" class="text-center text-md-left"><?php echo $lang['langs_01064'] ?></th>
							<th scope="col" class="text-center text-md-left"><?php echo $lang['langs_01065'] ?></th>
							<th scope="col" class="text-center text-md-left"><?php echo $lang['langs_01066'] ?></th>
						</tr>
					</thead>
					<tbody>
						<?php if(!$courier_deliveriesrow):?>
						<tr>
							<td colspan="11">
							
							<?php echo "
							<i align='center' class='display-3 text-warning d-block'><img src='dashboard/assets/images/alert/ohh_shipment.png' width='143' /></i>					
							",false;?>
							
							</td>
						</tr>
						
						<tr class="row100">
						<?php else:?>
						<?php foreach ($courier_deliveriesrow  as $row):?>							
							<td><a  href="edit_consolidated.php?do=edit_consolidated&amp;action=ship&amp;id=<?php echo $row->id;?>" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['booking-list11'] ?>"><?php echo $row->order_inv;?></a></td>
							<td><?php echo $row->c_driver;?> </td>
							<td><?php echo $row->c_address;?></td>
							<td><?php echo $row->created;?> | <?php echo $row->r_hour;?>  <span style="background: <?php echo $row->color; ?>;"  class="label label-large u-rounded" ><?php echo $row->status_courier;?></span></td>					
							<td>
								<a  href="edit_consolidated.php?do=edit_consolidatedg&amp;action=ship&amp;id=<?php echo $row->id;?>" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['booking-list11'] ?>"><i style="color:#343a40" class="ti-truck"></i> <?php echo $lang['langs_01067'] ?></a>
							</td>
						</tr>
						<?php endforeach;?>
						<?php unset($row);?>
						<?php endif;?>
					</tbody>
				</table>
			</div> <!-- END tab-content-->
 		
 			</div> <!-- END col-12 -->
 		</div> <!-- END row-->
 	</div> <!-- END container-->
</section> <!-- END section-->
       

<?php require_once("footer.php");?> 

	<div class="scroll-top bg-white box-shadow-v1">
		<i class="fa fa-angle-up" aria-hidden="true"></i>
	</div> 
	<script src="assets/js/bundle.js"></script>
	<script src="assets-theme/js/fury.js"></script>
	<script src="assets/js_/script.js"></script>
    <!-- Validate JS -->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
		
  </body>	
</html>