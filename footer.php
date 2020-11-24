<?php
  
  if (!defined("_VALID_PHP"))
	  die('Direct access to this location is not allowed.');
?>
<footer>
	<section class="bg-gray-v3">
		<div class="container">
		<div class="row">
			<div class="col-lg-2 col-md-6 ml-auto mb-5 mb-lg-0">
				<?php echo ($core->logo) ? '<img src="'.SITEURL.'/uploads/'.$core->logo.'" alt="'.$core->site_name.'" class="logo"/>': $core->site_name;?>
			</div>	
			<div class="col-lg-2 col-md-6 ml-auto mb-5 mb-lg-0">
				<h4 class="text-white">Resources</h4>
				<div class="u-h-4 u-w-50 bg-primary rounded mt-3 u-mb-20"></div>
				<ul class="list-unstyled u-lh-2 text-footer">
					<li><a href="track_shipment.php">Lacak Paket </a> </li>
					<li><a href="shipping-rates.php">Hitung Ongkir</a> </li>	
					<li><a href="login.php">Login </a> </li>	
					<li><a href="sign-up.php">Sing Up </a> </li>				
				</ul>
			</div>		
			<div class="col-lg-2 col-md-6 ml-auto mb-5 mb-lg-0">
				<h4 class="text-white">Company</h4>
				<div class="u-h-4 u-w-50 bg-primary rounded mt-3 u-mb-20"></div>
				<ul class="list-unstyled u-lh-2 text-footer">
					<li><a href="about.php">About Us </a> </li>			
					<li><a href="terms-and-privacy.php">Terms of Service</a></li>
					<li><a href="contact.php">Contact Us</a></li>
				</ul>
			</div>
			<div class="col-lg-3 col-md-6 ml-auto mb-5 mb-lg-0">
				<h4 class="text-white">Call center</h4>
				<div class="u-h-4 u-w-50 bg-primary rounded mt-3 u-mb-20"></div>
				<ul class="list-unstyled">
					<li class="mb-2">
						<span class="icon icon-Phone2 text-primary mr-2"></span> <a href="" class="text-footer">082132287324</a>
					</li>
					<li class="mb-2">
						<span class="icon icon-Mail text-primary mr-2"></span> <a href="husni.zayyin98@gmail.com" class="text-footer">husni.zayyin98@gmail.com</a>
					</li>
					<li class="mb-2">
						<span class="icon icon-Pointer text-primary mr-2"></span> <a href="" class="text-footer">Indonesia, Tasikmalaya</a>
					</li>
				</ul>
				<ul class="list-inline social social-rounded social-white mt-4">
					<li class="list-inline-item">
						<a href="#"><i class="fa fa-facebook"></i></a>
					</li>
					<li class="list-inline-item">
						<a href="#"><i class="fa fa-twitter"></i></a>
					</li>
					<li class="list-inline-item">
						<a href="#"><i class="fa fa-google-plus"></i></a>
					</li>
					<li class="list-inline-item">
						<a href="#"><i class="fa fa-linkedin"></i></a>
					</li>
				</ul>
			</div>
		</div> <!-- END row-->
	</div> <!-- END container-->
	</section> <!-- END section-->
	
	<section class="u-py-30 bg-gray-v5">
		<div class="container">				
			<p class="mb-0 text-center"> 
				&copy <?php echo date('Y').' '.$core->site_name;?> - <?php echo $lang['foot'] ?>
			</p>
		</div>
	</section>
</footer> <!-- END footer-->