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

  	$ratesrow = $core->getRates();
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
  <title>Shipping rates | <?php echo $core->site_name;?></title>
  
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

<section class="u-py-30 u-pt-lg-200 u-pb-lg-50 u-flex-center box-shadow-v2" style="
background: #FC5C7D;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #6A82FB, #FC5C7D);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #6A82FB, #FC5C7D); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
  <div class="container">
    <div class="row">
    	<div class="col-12 text-center text-white">
    		<h1 class="text-white">SHIPPING COST CALCULATOR</h1>
    		<div class="u-h-4 u-w-50 bg-white rounded mx-auto my-4"></div>
    		<p class="lead">
    			THE BEST SOLUTION IN WORLDWIDE SHIPMENTS
    		</p>
    	</div>
    </div> <!-- END row-->
  </div> <!-- END container-->
</section> <!-- END intro-hero-->

<section>
  <div class="container">
   <div class="row align-items-center">
		<div class="col-lg-12 ml-auto mt-5 mb-4">
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" accept-charset="utf-8">
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<img src="assets_/images/bg.jpg " alt="Shipping Calculator">
						</div>
					</div>
				
					<div class="col-md-4">
						<div class="form-group">
							<label for="ReceiptKind">Tipe</label>
							<select  class="form-control add-listing_form" id="ReceiptKind" name="type" required="required">
								<option value="Reguler dibawah 1kg">Reguler < 1Kg </option>
								<option value="Diatas 1 kg">Medium > 1kg</option>
								<option value="Diatas 10kg">Logistik 10Kg </option>
		
							</select>
						</div>
					</div>
					<div class="col-md-4 parcel_country">
						<div class="form-group">
							<label for="ReceiptCountryId">Kota Tujuan</label>
							<input type="text" class="form-control"  name="scountry" id="ReceiptCountryId" placeholder="Select Country" list="browsers" autocomplete="off" required="required">
							<datalist id="browsers">
								<option value="United States">United States</option> 
								<option value="Jakarta">Jakarta</option>
								<option value="Tasikmalaya">Tasikmalaya</option>
								<option value="Bandung">Bandung</option>
								<option value="Surabaya">Surabaya</option>
								<option value="Semarang">Semarang</option>
								<option value="Solo">Solo</option>
								<option value="JogjaKrta">Jogja</option>
								<option value="Garut">Garut</option>
								<option value="Ciamis">Ciamis</option>
							</datalist>
						</div>
					</div>							
				</div>

				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							
						</div>
					</div>
					<div class="col-md-4 nondoc">
						<div class="form-group">
							<label for="sum2">Berat (Kg).</label>
							<input  class="form-control add-listing_form" onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();"  id="sum2" name="r_weight" required="required">
						</div>
					</div>
					<div class="col-sm-4 doconly">
						<div class="form-group required">
							
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							
						</div>
					</div>
					<div class="col-md-8">
						<div class="form-group">
							<label>Dimensi: Panjang x Lebar x Tinggi (cm)</label>
							<div class="input-group">
								<input onblur="if(this.value == ''){this.value='0'}"  onKeyUp="suma();" id="l1" name="length" class="form-control" step="any" type="number" value="0" required="required"/>
								<span class="input-group-addon"><strong>X</strong></span>
								<input onblur="if(this.value == ''){this.value='0'}"  onKeyUp="suma();" id="w2" name="width" class="form-control" step="any" type="number" value="0" required="required"/>
								<span class="input-group-addon"><strong>X</strong></span>
								<input onblur="if(this.value == ''){this.value='0'}"  onKeyUp="suma();" id="h3" name="height" class="form-control" step="any" type="number" value="0" required="required"/>
								<input type="number" class="form-control"  value="0" id="total_result" name="weight" style="display:none;">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							
						</div>
					</div>
					<div class="col-md-8">
						<div class="form-group">
							<button type="submit" class="btn btn btn-rounded btn-primary m-3 px-md-5 pull-right" name="submit"><i class="fa fa-cube mr-1"></i> Cari Harga Terbaik </button>
						</div>	
					</div>
				</div>	
			</form>	
		</div>	
   </div> <!-- END 	row-->

   <hr class="u-my-60">

   <div class="row align-items-center">
		<div class="col-lg-12 my-4 order-2 order-lg-1">
			<?php if(!$ratesrow):?>
			<tr>
				<td colspan="4">
				
				<?php echo "
				<i align='center' class='display-3 text-warning d-block'><img src='dashboard/assets/images/alert/ohh_shipment_rate.png' width='130' /></i>					
				",false;?>
				
				</td>
			</tr>
			<?php else:?>
			
			<table class="table shopping-cart-wrap">	
				<thead class="text-muted">
					<tr>
					  <th scope="col"></th>
					  <th scope="col" width="250">Waktu Tempuh</th>
					  <th scope="col" width="200">Service</th>
					  <th scope="col" width="200" class="text-center">Ongkos Kirim
					  <img src="uploads/tooltip.svg" data-toggle="tooltip" data-html="true" data-placement="top" title="Please note that the final price may vary depending on: - Parcel size - Delivery/pickup loctions - Taxes &amp; duties  S"></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($ratesrow  as $row):?>
					<tr>
						<td class="align-middle">
							<div class="price-wrap">
								<img src="thumbmaker.php?src=<?php echo UPLOADURL;?><?php echo ($row->brand) ? $row->brand : "no_photo.png";?>&amp;w=120&amp;h=60&amp;s=1&amp;a=t1" alt="" title="<?php echo $row->n_courier;?>">	 <?php echo $row->services;?>
							</div>								
						</td>
						<td class="align-middle"> 
							<div class="price-wrap">
								<span><?php echo $row->deli_time;?></span>
							</div>
						</td>
						<td class="align-middle"> 
							<div class="price-wrap">
								<dl class="param param-inline small">
									<?php if($row->free_ship == 'Free Pickup'){ ?><span><img src="uploads/free.svg" alt="#" class="img-fluid"> <?php echo $row->free_ship;?></span><?php }else{ ?> <?php } ?></br>
									<?php if($row->drop_off == 'Drop-off'){ ?><span><img src="uploads/drop_off.svg" alt="#" class="img-fluid"> <?php echo $row->drop_off;?></span><?php }else{ ?> <?php } ?>
								</dl>	
							</div>
						</td>
						<td class="align-middle"> 
							<div class="price-wrap"> 
								<b><?php echo $core->currency;?> <span><?php echo $row->rate;?></span></b> 
								 <a href="booking.php?do=booking&amp;action=ship&amp;id=<?php echo $row->id;?>&amp;length=<?php if(isset($_POST['length'])){echo $_POST['length'];}else{ echo 0; }?>&amp;width=<?php if(isset($_POST['width'])){echo $_POST['width'];}else{ echo 0;}?>&amp;height=<?php if(isset($_POST['height'])){echo $_POST['height'];}else{echo 0;}?>&amp;weight=<?php if(isset($_POST['weight'])){echo $_POST['weight'];}else{echo $_POST['r_weight'];}?>&amp;type=<?php if(isset($_POST['type'])){echo $_POST['type'];}else{ echo " "; }?>&amp;scountry=<?php if(isset($_POST['scountry'])){echo $_POST['scountry'];}else{ echo " "; }?>"><button class="btn btn-sm btn-rounded btn-outline-green px-md-3 m-3">Ship</button></a> 
							</div>
						</td>								
					</tr>
					<?php endforeach;?>
					<?php unset($row);?>
					<?php endif;?>
				</tbody>
			</table>
		</div> <!-- END col-md-6-->
   </div> <!-- END 	row-->
  </div> <!-- END container-->
</section> <!-- END section-->
       

<?php require_once("footer.php");?> 

	<div class="scroll-top bg-white box-shadow-v1">
		<i class="fa fa-angle-up" aria-hidden="true"></i>
	</div> 
	
	<script type="text/javascript">

		function suma(){
			
			<!--General sale formula-->
			var num2 = "5.56789";
			var sum2 = document.getElementById("sum2");
			
			<!--VOLUMETRIC WEIGHT-->
			var l1 = document.getElementById("l1");
			var w2 = document.getElementById("w2");


			var input = document.getElementById("total_result");
			
			<!--Formula Values-->
			var volumetric = <?php echo $core->meter;?>;

			var total_metric = l1.value * w2.value * h3.value/volumetric; 		<!--Volumetric weight result-->
			var total_weight = sum2.value; 										<!--Shipping weight value-->	
			
			
			var calculate_weight;
			if (total_weight > total_metric) {
				calculate_weight = total_weight;
			} else {
				calculate_weight = total_metric;
			}
			
			
			total_result = parseFloat(parseFloat(calculate_weight)) .toFixed(2); <!--Total result formula-->
			
			input.value= total_result;

		}
			

		function kindCheck(){
			if ($('#ReceiptKind').val() != 'Document') {
				$('.nondoc').show();
				$('.doconly').hide();

				document.getElementById('sum2').required = true;
				
				$('.input-group input').prop('disabled',false);
			} else {
				$('.nondoc').hide();
				$('.doconly').show();

				document.getElementById('sum2').required = false;

				$('.input-group input').prop('disabled',true);
			}

			
		}

		$('#ReceiptCompareForm .countryselect').select2();

		$(document).ready(function(){
			kindCheck();
		});

		$('#ReceiptKind').change(function() {
			kindCheck();
		});
		
	//]]>

	</script>
	
	<script src="assets-theme/js/fury.js"></script>
	<script src="assets/js_/script.js"></script>
    <!-- Validate JS -->
    <script src="assets/js_/validate.js"></script>
    <!-- Contact JS -->
    <script src="assets/js_/contact.js"></script>

    <script src="assets/js_/popper.min.js"></script>
    <script src="assets/js_/bootstrap.min.js"></script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/application.js"></script>
	<script type="text/javascript" src="js/select2.min.js"></script>

		
  </body>	
</html>