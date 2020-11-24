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
  <meta name="keywords" content="Courier DEPRIXA-Integral Web System" />
  <meta name="author" content="Jaomweb">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!--Favicon-->
  <link rel="icon" href="uploads/favicon.png">
  
  <!-- Title-->
  <title> Now you can shipment worldwide | <?php echo $core->site_name;?></title>
  
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
 
<header class="header-top bg-gray-v1">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-6 mb-3 mb-md-0 text-center text-md-left">
			<ul class="list-inline mb-0">
				<li class="list-inline-item mr-3">
					<span class="icon icon-Phone2 text-primary mr-1"></span> 082132287324
				</li>
				<li class="list-inline-item">
					<span class="icon icon-Mail text-primary mr-1"></span> <a href="husni.zayyin98@gmail.com">husni.zayyin98@gmail.com</a>
				</li>
			</ul> <!-- END list-inline-->
			</div> <!-- END col-md-6 -->
			<div class="col-md-6 mb-3 mb-md-0">
				<ul class="list-inline social social-rounded social-default social-sm mb-0 text-center text-md-right">
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
			</div> <!-- END col-md-6 -->
		</div> <!-- END row-->
	</div> <!-- END container-->
</header> <!-- END header-top-->

 <header class="header header-shrink sticky-top bg-gray-v1">
  <div class="container">
    <nav class="navbar navbar-expand-lg px-md-0">
     
		<?php require_once("header.php");?> 
      
    </nav>
  </div> <!-- END container-->
</header> <!-- END header-inverse -->


<section class="u-py-md-250 u-flex-center" style="background:#ECF5FE url(assets-theme/img/startup/hero-banner.png) no-repeat; background-size:cover; background-position: center;">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-7 mb-5 mb-lg-0">
        <h1 class="display-4 u-fw-600">
          <span class="text-primary">Tercepat</span> <span class="text-white">Di Indonesia</span>
        </h1>
        <p class="u-fs-22 u-lh-1_8 my-4 text-white">
          Kirim barang cepat lewat bus dijamin 1 hari sampai tujuan
        </p>
        <a href="sign-up.php" class="btn btn btn-rounded btn-primary  u-w-170 u-mt-15">
        	Mulai
        </a>
      </div> <!-- END col-lg-7-->
      

      <div class="col-lg-5">
			<div class="card box-shadow-v2 bg-white u-of-hidden text-center">
			 	<form action="result_track_shipment.php" method="post" class="p-4 p-md-5">
					<div class="input-group u-rounded-50 border u-of-hidden u-mb-20">
						<input type="text" name="order_inv" class="form-control border-0 p-3" placeholder="Nomor Resi(AWB-100000001)" required>
					</div>
			 		<button type="submit" name="submit" class="btn btn-primary btn-rounded">
			 			<span class="icon icon-Truck text-white"></span>&nbsp;&nbsp; Lacak Paket
			 		</button>
			 	</form>
			</div>
      </div> <!-- END col-lg-5-->
    </div> <!-- END row-->
  </div> <!-- END container-->
</section> <!-- END intro-hero-->

                                                                
<section id="about" class="pb-0">
  <div class="container">
    <div class="row text-center">
    	<div class="col-lg-9 mx-auto">
    		<h2 class="h1">
    			Pengiriman lebih cepat karena setiao jam ada bus yang jalan menuju kota tujuan
    		</h2>
    		<div class="u-h-4 u-w-70 bg-primary rounded mt-4 u-mb-30 mx-auto"></div>
    		<p>
    			Kami adalah perusahaan bus terbesar di Jawa Barat memliki lebih dari 7000 Armada dengan Tujuan Jakarta, Jogja, Bandung, Semarang, Solo, Wonosobo, Hingga Ponorogo 
    		</p>
    		<a href="shipping-rates.php" class="btn btn-primary btn-rounded mt-4">Hitung Ongkir Disini</a>
    	</div>
		 <div class="col-12 u-mt-10 text-center">
     	<img src="assets-theme/img/startup/s-1.png" alt="">
     </div>
    </div> <!-- END row-->
  </div> <!-- END container-->
</section> <!-- END section-->

                                      
<section class="bg-gray-v2 u-pb-80">  
  <div class="container">
   <div class="row">
		<div class="col-lg-4 col-md-6 u-mb-70">
		<div class="media">
			<span class="icon icon-FileBox text-primary u-fs-50 mr-4"></span>
				<div class="media-body">
					<h4>
						Pilih Perushaan Bus
					</h4>
					<p>
						Bisa meilih PO. Bus Favorit 
					</p>
				</div>
			</div>
		</div> <!-- END col-lg-4 col-md-6-->
		
		<div class="col-lg-4 col-md-6 u-mb-70">
		<div class="media">
			<span class="icon icon-Files text-primary u-fs-50 mr-4"></span>
				<div class="media-body">
					<h4>
						Cetak Label sendiri
					</h4>
					<p>
						Kami memberi anda kemudahan bagi UMKM dengan mencetak label pengiriman untuk mempercepat proses pengiriman
					</p>
				</div>
			</div>
		</div> <!-- END col-lg-4 col-md-6-->
		
		<div class="col-lg-4 col-md-6 u-mb-70">
		<div class="media">
			<span class="icon icon-Truck text-primary u-fs-50 mr-4"></span>
				<div class="media-body">
					<h4>
						Layanan Pickup Paket
					</h4>
					<p>
						Layanan Pickup paket akan segera hadir tunggu kejutan dari kami
					</p>
				</div>
			</div>
		</div> <!-- END col-lg-4 col-md-6-->
		
		<div class="col-lg-4 col-md-6 u-mb-70">
		<div class="media">
			<span class="icon icon-Pointer text-primary u-fs-50 mr-4"></span>
				<div class="media-body">
					<h4>
						Tujuan
					</h4>
					<p>
						Tujuan berbagai kota di pulau jawa.
					</p>
				</div>
			</div>
		</div> <!-- END col-lg-4 col-md-6-->
		
		<div class="col-lg-4 col-md-6 u-mb-70">
		<div class="media">
			<span class="icon icon-Resume text-primary u-fs-50 mr-4"></span>
				<div class="media-body">
					<h4>
						Rekanan Bisnis
					</h4>
					<p>
						Kami juga membuka rekan bisnis untuk Agen atau drop point untuk setiap kota di Indonesia hubungi call center.
					</p>
				</div>
			</div>
		</div> <!-- END col-lg-4 col-md-6-->
		
		<div class="col-lg-4 col-md-6 u-mb-70">
		<div class="media">
			<span class="icon icon-Starship2 text-primary u-fs-50 mr-4"></span>
				<div class="media-body">
					<h4>
						Keamanan
					</h4>
					<p>
						Setiap barang yang kirim kami cover assuransi supaya lebih aman.
					</p>
				</div>
			</div>
		</div> <!-- END col-lg-4 col-md-6-->
		
   </div> <!--END row-->
  </div> <!-- END container-->
</section> <!-- END section-->


 <section style="background:#7C7C7C url(assets-theme/img/keynote.jpg) no-repeat; background-size:cover; background-position: top right;">
 <div class="overlay bg-black-opacity-0_5"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-6 m-auto text-center">
        <h2 class="h1 text-white mb-4">
          Aman dan Cepat Dalam Pengiriman
        </h2>
        <a data-fancy href="https://vimeo.com/234370477" data-fancybox>
          <span class="icon icon-Play u-fs-50 u-fs-md-72 text-white"></span>
        </a>
      </div>
    </div> <!-- END row-->
  </div> <!-- END container-->
</section> <!-- END section--> 
            
<section class="u-py-100 bg-white-v2">
	<div class="container">
		<div class="row text-center">
		
			<div class="col-md-4 mt-5 mt-md-0">
				<span class="icon icon-WorldWide u-fs-60 text-primary"></span>
				<h3 class="my-4">
					QUALITY
				</h3>
				<p>
					Kualitas terus kami tingkatkan demi kenyamanan anda
				</p>
			</div>  <!-- END col-md-4 -->
		
			<div class="col-md-4 mt-5 mt-md-0">
				<span class="icon icon-Starship u-fs-60 text-primary"></span>
				<h3 class="my-4">
					FAST
				</h3>
				<p>
					Cepat karena kami memliki lebih dari 7000 armada
				</p>
			</div>  <!-- END col-md-4 -->
		
			<div class="col-md-4 mt-5 mt-md-0">
				<span class="icon icon-Shield u-fs-60 text-primary"></span>
				<h3 class="my-4">
					SAFE
				</h3>
				<p>
					Aman karena barang memiliki nomer resi dan didaftrakan asuransi.
				</p>
			</div>  <!-- END col-md-4 -->
			
		</div> <!-- END row-->
	</div> <!-- END container-->
</section>


<section class="u-py-100 bg-white-v2">
	<div class="container">
		<div class="row">
			<div class="col-12 d-md-flex justify-content-between text-center">
				
				</div>
			</div>
		</div> <!-- END row-->
	</div> <!-- END container-->
</section>
     

<?php require_once("footer.php");?> 

	<div class="scroll-top bg-white box-shadow-v1">
		<i class="fa fa-angle-up" aria-hidden="true"></i>
	</div> 
	

	<script src="assets-theme/js/bundle.js"></script>
	<script src="assets-theme/js/fury.js"></script>
	<script src="assets/vendor/parallax.js/parallax.min.js"></script>

  </body>	

</html>