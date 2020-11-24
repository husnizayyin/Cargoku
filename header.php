 <?php

  
  if (!defined("_VALID_PHP"))
      die('Direct access to this location is not allowed.');
	  
	  $news = $core->renderNews();
	  $courier_onlinerow = $user->getCourier_list_booking();
	  $courier_deliveriesrow = $user->getCourier_deliveries_list();
	  $deliverpackagerow = $user->getDeliverpackage_list();
	  $courierrow = $user->getConsolidateonline_list();
?>

			<a class="navbar-brand" href="index.php">
				
				
			</a>

			<button class="navbar-toggler p-0" data-toggle="collapse" data-target="#navbarNav">
              <div class="hamburger hamburger--spin js-hamburger">
                    <div class="hamburger-box">
                      <div class="hamburger-inner"></div>
                    </div>
                </div>
			</button>

			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ml-auto">
					
					<?php if($user->is_Admin()):?>
					
					<?php elseif($user->userlevel == 1):?>
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Beranda</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Hitung Ongkir <i class="lnr lnr-chevron-down u-fs-12 ml-1"></i>
						</a>
						<div class="dropdown-menu box-shadow-v2" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="shipping-rates.php">Hitung Ongkir dulu</a>
							<a class="dropdown-item" href="track_shipment.php">Lacak Paket</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link" href="consolidated_list.php">
							Consolidasi
						</a>
					</li>
					
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Pesanan Saya <i class="lnr lnr-chevron-down u-fs-12 ml-1"></i>
						</a>
						<div class="dropdown-menu box-shadow-v2" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="booking_list.php">Daftar Pesanan </a>
						</div>
					</li>
					<?php elseif($user->userlevel == 3):?>
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Beranda</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							TRACK <i class="lnr lnr-chevron-down u-fs-12 ml-1"></i>
						</a>
						<div class="dropdown-menu box-shadow-v2" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="track_shipment.php">Lacak Paket/a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="deliveries_list.php" >
							Daftar Diterima
						</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="consolidated_deliveries.php" >
							Consolidated deliveries List
						</a>
					</li>
					<?php else:?>
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Beranda</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Hitung Ongkir <i class="lnr lnr-chevron-down u-fs-12 ml-1"></i>
						</a>
						<div class="dropdown-menu box-shadow-v2" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="shipping-rates.php">Hitung Ongkir dulu</a>
							<a class="dropdown-item" href="track_shipment.php">Lacak Paket</a>
						</div>
					</li>
					
					<li class="nav-item dropdown">
						<a class="nav-link" href="about.php">
							Abouts
						</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link" href="contact.php">
							Contact
						</a>
					</li>
					
					<li class="nav-item dropdown"></li>
					<li class="nav-item dropdown"></li>
					<li class="nav-item dropdown"></li>
					<li class="nav-item dropdown"></li>
					
					<?php endif;?>
					
					<?php if($user->is_Admin()):?>
					<li class="nav-item dropdown">
						<a class="nav-link" href="dashboard/user.php?do=main&action=edit&id=1"><span class="icon icon-User text-warning"></span>
							<?php echo $user->username;?>
						</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link" href="dashboard"><span class="icon icon-Web text-warning"></span>
							Dashboard
						</a>
					</li>
					<?php elseif($user->logged_in):?>
					<li class="nav-item dropdown">
						<a class="nav-link" href="login.php">
							|
						</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link" href="account.php"><span class="icon icon-User text-warning"></span>
							<?php echo $user->username;?>
						</a>
					</li>
					<?php else:?>
					<li class="nav-item dropdown">
						<a class="nav-link" href="login.php">
							Log In
						</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link" href="sign-up.php">
							Sing Up
						</a>
					</li>
					<?php endif;?>
					
					
					
					<?php if($user->logged_in):?>
					<li class="nav-item dropdown">
						<a class="nav-link" href="logout.php"><span class="icon-signout text-primary"></span> 
							Logout
						</a>
					</li>
					<?php endif;?>
				</ul>
			</div>
		