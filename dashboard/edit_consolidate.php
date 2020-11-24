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
  require_once("../init.php");
  
  if (!$user->is_Admin())
      redirect_to("login.php");
	
	$row = $user->getUserData();
	
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../uploads/favicon.png">
	
    <title><?php echo $lang['langs_089'] ?> | <?php echo $core->site_name ?></title>
    <!-- This page plugin CSS -->

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">

</head>

<body>

    <div id="main-wrapper">
	
        <?php include 'topbar.php'; ?>
		
        <!-- End Topbar header -->

		
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
 
		<?php include 'left_sidebar.php'; ?>

        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
		
		<!-- General queries to the database  -->

        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 align-self-center">
                        <h4 class="page-title"><?php include("filter.php");?></h4>
						</br>
						<?php echo $lang['langs_090'] ?><b></b>
                    </div>
                </div>
				<?php include 'head_courier.php'; ?>
            </div>

            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
				<?php switch(Filter::$action): case "ship": ?>
				<?php $row = Core::getRowById(Core::consolTable, Filter::$id);?> 
				<form id="admin_form" method="post">
                <div class="row">				
					<div class="col-sm-12 col-lg-6">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title"><?php echo $lang['langs_091'] ?></h4>
								<div class="row">									
									<div class="col-sm-12 col-md-6" style="display:none">
										<div class="form-group">
											<label for="inputname" class="control-label col-form-label">Staff Role*</label>
											<input type="text" class="form-control" name="username" value="<?php echo $user->username; ?>" placeholder="Staff Role" readonly>
										</div>
									</div>										
									<div class="col-sm-12 col-md-3">
										<label for="inputname" class="control-label col-form-label"><?php echo $lang['langs_092'] ?></label>
										<div class="input-group mb-3">
											<input class="form-control" id="exampleFormControlSelect1" name="r_name" value="<?php echo $row->r_name; ?>" placeholder="Name Customer" readonly>
										</div>
									</div>
									<div class="col-sm-12 col-md-3">
										<label for="inputname" class="control-label col-form-label"><?php echo $lang['langs_093'] ?></label>
										<div class="input-group mb-3">
											<input class="form-control" id="exampleFormControlSelect1" name="r_email" value="<?php echo $row->r_email; ?>" placeholder="Email" readonly>
										</div>
									</div>
									<div class="col-sm-12 col-md-3">
										<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['langs_094'] ?></i></label>
										<div class="input-group">
											<input type="text" class="form-control" name="r_address" value="<?php echo $row->r_address; ?>" placeholder="Address"  readonly>
										</div>
									</div>
									<div class="col-sm-12 col-md-3">
										<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['langs_095'] ?></i></label>
										<div class="input-group">
											<input type="text" class="form-control" name="r_phone" value="<?php echo $row->r_phone; ?>" placeholder="Phone" readonly>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12 col-md-3">
										<label for="inputlname" class="control-label col-form-label"><?php echo $lang['langs_096'] ?></label>
										<div class="input-group">
											<input class="form-control" name="r_dest" value="<?php echo $row->r_dest; ?>">
										</div>
									</div>
									<div class="col-sm-12 col-md-3">
										<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['langs_097'] ?></label>
										<div class="input-group">
											<input class="form-control" name="c_address" value="<?php echo $row->c_address; ?>">
										</div>
									</div>
									<div class="col-sm-12 col-md-3">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['langs_098'] ?></label>
										<div class="input-group mb-3">
											<input class="form-control" name="courier" value="<?php echo $row->courier; ?>">
										</div>
									</div>
									<div class="col-sm-12 col-md-3">
										<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['langs_099'] ?></label>
										<div class="input-group">
											<input class="form-control" name="service_options" value="<?php echo $row->service_options; ?>">
										</div>
									</div>								                                     
								</div>
								<div class="row"> 									
									<div class="col-sm-12 col-md-3">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['langs_0100'] ?></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1"><i class="icon-clock"></i></span>
											</div>
											<input type="text" class="form-control" name="deli_time" value="<?php echo $row->deli_time; ?>">
										</div>
									</div>

									<div class="col-sm-12 col-md-3">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['langs_0101'] ?></label>
										<div class="input-group mb-3">
											<input class="form-control" name="c_driver" value="<?php echo $row->c_driver; ?>" readonly>	
										</div>
									</div>
									
									<div class="col-sm-12 col-md-3">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['langs_0102'] ?></label>
										<div class="input-group mb-3">
											<input class="form-control" name="code_off" value="<?php echo $row->code_off; ?>" readonly>	
										</div>
									</div>
									<div class="col-sm-12 col-md-3">
										<label for="inputname" class="control-label col-form-label"><?php echo $lang['langs_0103'] ?></label>
										<input class="form-control" name="status_courier" value="<?php echo $row->status_courier; ?>">
									</div>
								</div>
								
							</div>
						</div>
					</div>

					<div class="col-sm-12 col-lg-3">
						<div class="card">
							<div class="card-body">
							<h4 class="card-title"><?php echo $lang['edit-container16'] ?></h4>
								<div class="row">
									<div class="col-sm-12 col-md-6">										
										<label for="inputcom" class="control-label col-form-label"><?php echo $lang['langs_0104'] ?></label>
										<div class="input-group mb-6">
											<input type="text" class="form-control" name="order_inv" value="<?php echo $row->order_inv; ?>" readonly>
										</div>
									</div>
									<div class="col-sm-12 col-md-6">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['langs_0105'] ?></label>
										<div class="input-group mb-3">
											<input type="number" class="form-control" name="seals" value="<?php echo $row->seals; ?>" readonly>
										</div>
									</div>
								</div>
								<div class="card-body bg-light">
									<div class="row">										
										<div class="col-sm-12 col-md-12">
											<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['langs_0106'] ?></label>
											<div class="input-group">
												 <textarea class="form-control" rows="3" name="comments" placeholder="<?php echo $lang['edit-container20'] ?>"><?php echo $row->comments; ?></textarea>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-sm-12 col-lg-3">
						<div class="card">
							<div class="card-body">
								<div class="card-body">
									<div class="row">
										<div class="col-sm-12 col-md-6">
											<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['langs_0107'] ?></label>
											<div class="input-group">
												<input type="number" class="form-control" name="r_qnty" value="<?php echo $row->r_qnty; ?>" placeholder="Quantity">
											</div>
										</div>
									
										<div class="col-sm-12 col-md-6">
											<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['langs_0108'] ?></label>
											<div class="input-group">
												<input type="number" class="form-control" name="r_weight" onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();" id="sum2" value="<?php echo $row->r_weight; ?>" placeholder="Total Weight">
											</div>
										</div>
										<div class="col-sm-12 col-md-6">
											<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['langs_0109'] ?></label>
											<div class="input-group">
												<input type="number" class="form-control" name="c_add_pound" onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();" id="sum3" value="<?php echo $row->c_add_pound; ?>" placeholder="Additional pound">
											</div>
										</div>
										<div class="col-sm-12 col-md-6">
											<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['langs_01010'] ?></label>
											<div class="input-group">
												<input type="number" class="form-control" name="r_declarate" onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();" id="sum4" value="<?php echo $row->r_declarate; ?>" placeholder="Total Declared value">
											</div>
										</div>
										
										<div class="col-sm-12 col-md-6">
											<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['langs_01011'] ?></label>
											<div class="input-group">
												<input type="number" class="form-control" name="reexpedition" onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();" id="sum5" value="<?php echo $row->reexpedition; ?>" placeholder="Re expedition">
											</div>
										</div>
										<div class="col-sm-12 col-md-6">
											<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['langs_01012'] ?></label>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text"><?php echo $core->currency;?></span>
												</div>
												<input type="text" class="form-control" name="r_costtotal" id="total_result" value="<?php echo $row->r_costtotal; ?>" readonly>
											</div>
										</div>
										<!--/span-->
									</div>
								</div>
								<hr>
								<div class="form-actions">
									<div class="card-body">
										<div class="row">
											<div class="col-md-12">
												<div class="row">
													<div class="col-md-offset-3 col-md-12">
														<button type="submit" name="dosubmit" class="btn btn-success"> <i class="mdi mdi-gift"></i>&nbsp; <?php echo $lang['langs_01013'] ?></button>
														<a href="consolidate.php?do=list_consolidate" class="btn btn-dark"><i class="icon-action-undo"></i> <?php echo $lang['edit-container32'] ?></a> 
													</div>
												</div>
											</div>
											<div class="col-md-6"> </div>
										</div>
									</div>
								</div>
								<input name="id" type="hidden" value="<?php echo Filter::$id;?>" />
							</div>
						</div>
					</div>
				</form>
                <!-- End row -->
				<?php echo Core::doForm("processConsolidate_update");?>
				<?php break;?>
				<?php endswitch;?>
				</div>
			</div>	
		

		
		<?php

		  if (!defined("_VALID_PHP"))
			  die('Direct access to this location is not allowed.');
		?>			
		
		<footer class="footer text-center">
			&copy <?php echo date('Y').' '.$core->site_name;?> - <?php echo $lang['foot'] ?>
		</footer>

		<!-- End footer -->
	</div>
</div>

	<!-- End Wrapper -->

		<!-- ============================================================== -->
		<!-- All Jquery -->
		
		<!-- ============================================================== -->
		<!-- Bootstrap tether Core JavaScript -->
		
		<script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
		<script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
		<!-- apps -->
		<script src="dist/js/app.min.js"></script>
		<script src="dist/js/app.init.js"></script>
		<script src="dist/js/app-style-switcher.js"></script>
		<!-- slimscrollbar scrollbar JavaScript -->
		<script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
		<script src="assets/extra-libs/sparkline/sparkline.js"></script>
		<!--Wave Effects -->
		<script src="dist/js/waves.js"></script>
		<!--Menu sidebar -->
		<script src="dist/js/sidebarmenu.js"></script>
		<!--Custom JavaScript -->
		<script src="dist/js/custom.min.js"></script>

		
</body>

</html>