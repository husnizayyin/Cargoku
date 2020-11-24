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
	
    <title><?php echo $lang['edit-courieronline1'] ?> | <?php echo $core->site_name ?></title>
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
                    <div class="col-5 align-self-center">
                        <h4 class="page-title"><?php include("filter.php");?></h4>
                    </div>
                </div>
				<?php $office = $core->getOffices(); ?>
				<?php include 'head_courier.php'; ?>
            </div>

            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- row -->
				<!-- Edit Shipment -->
				<?php switch(Filter::$action): case "ship": ?>
				<?php $row = Core::getRowById(Core::cTable, Filter::$id);?>
				<form id="admin_form" method="post">
					<div class="row">
						<div class="col-sm-12 col-lg-6" style="display:none">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Sender Data:</h4>
									<hr>

									<div class="row">
										<div class="col-sm-12 col-md-6">
											<div class="form-group">
												<label for="inputname" class="control-label col-form-label">Staff Role*</label>
												<input type="text" class="form-control" name="level" value="<?php echo $user->username; ?>" placeholder="Staff Role">
											</div>
										</div>
										<div class="col-sm-12 col-md-6">
											<div class="form-group">
												<label for="inputEmail3" class="control-label col-form-label">Addres</label>
												<input type="text" class="form-control is-valid" name="address" value="<?php echo $row->address;?>" placeholder="Address">
											</div>
										</div>
										<div class="col-sm-12 col-md-3">
											<div class="form-group">
												<label for="inputcontact" class="control-label col-form-label">Phone</label>
												<input type="number" class="form-control is-valid" name="phone" value="<?php echo $row->phone;?>" placeholder="Phone">
											</div>
										</div>
										<div class="col-sm-12 col-md-3">
											<div class="form-group">
												<label for="inputEmail3" class="control-label col-form-label">Origin</label>
												<input type="text" class="form-control is-valid" name="country" value="<?php echo $row->country;?>" placeholder="Origin">
											</div>
										</div>                                       
									</div>
									<div class="row"> 
										<div class="col-sm-12 col-md-3">
											<div class="form-group">
												<label for="inputcontact" class="control-label col-form-label">City</label>
												<input type="text" class="form-control is-valid" name="city" value="" placeholder="City">
											</div>
										</div>
									
										<div class="col-sm-12 col-md-3">
											<div class="form-group">
												<label for="inputEmail3" class="control-label col-form-label">Postal Code</label>
												<input type="text" class="form-control is-valid" name="postal" value="<?php echo $row->postal;?>" placeholder="Postal Code">
											</div>
										</div>
										<div class="col-sm-12 col-md-6">
											<div class="form-group">
												<label for="inputcontact" class="control-label col-form-label">Email</label>
												<input type="email" class="form-control is-valid" name="email" value="<?php echo $row->email;?>" placeholder="Email">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-lg-6">
							<div class="card">
								<div class="card-body">
								<h4 class="card-title"><?php echo $lang['edit-courieronline2'] ?></h4>
									<div class="row">
										<div class="col-sm-12 col-md-6">
											<div class="form-group">
												<label for="inputname" class="control-label col-form-label"><?php echo $lang['edit-courieronline3'] ?></label>
												<input type="text" class="form-control" name="s_name" value="<?php echo $row->s_name;?>" placeholder="<?php echo $lang['edit-courieronline4'] ?>">
											</div>
										</div>
										<div class="col-sm-12 col-md-6" style="display:none">
											<div class="form-group">
												<label for="inputcontact" class="control-label col-form-label">Email</label>
												<div class="input-group mb-3">
													<input type="email" class="form-control" name="r_email" value="<?php echo $row->r_email;?>">
												</div>
											</div>
										</div>
										<div class="col-sm-12 col-md-6">
											<label for="inputname" class="control-label col-form-label"><?php echo $lang['edit-courieronline5'] ?></label>
											<div class="input-group mb-3">
												<input type="text" class="form-control" name="r_name" value="<?php echo $row->r_name;?>">
											</div>
										</div>
									</div>
									<div class="row" style="display:none">
										<div class="col-sm-12 col-md-4">
											<label for="inputlname" class="control-label col-form-label">Address</label>
											<div class="input-group mb-3">
												<input type="text" class="form-control" name="r_address" value="<?php echo $row->r_address;?>">
											</div>
										</div>
										<div class="col-sm-12 col-md-4">
											<label for="inputEmail3" class="control-label col-form-label">Phone</label>
											<div class="input-group mb-3">
												<input type="number" class="form-control" name="r_phone" value="<?php echo $row->r_phone;?>">
											</div>
										</div>
										<div class="col-sm-12 col-md-4">
											<label for="inputcontact" class="control-label col-form-label">Cell Phone</label>
											<div class="input-group mb-3">
												<input type="number" class="form-control" name="rc_phone" value="<?php echo $row->rc_phone;?>">
											</div>
										</div>									                                     
									</div>
									<div class="row" style="display:none"> 
										<div class="col-sm-12 col-md-4">
											<label for="inputEmail3" class="control-label col-form-label">Destination</label>
											<div class="input-group mb-3">
												<input type="text" class="form-control" name="r_dest" value="<?php echo $row->r_dest;?>">
											</div>
										</div>  
										<div class="col-sm-12 col-md-4">
											<label for="inputcontact" class="control-label col-form-label">City</label>
											<div class="input-group mb-3">
												<input type="text" class="form-control" name="r_city" value="<?php echo $row->r_city;?>">
											</div>
										</div>
									
										<div class="col-sm-12 col-md-4">
											<label for="inputEmail3" class="control-label col-form-label">Postal Code</label>
											<div class="input-group mb-3">
												<input type="text" class="form-control" name="r_postal" value="<?php echo $row->r_postal;?>">
											</div>
										</div>
									</div>
									
									<div class="row"> </br></div>
									<hr class="m-t-0 m-b-35">
									
									<h4 class="card-title"><?php echo $lang['edit-courieronline6'] ?></h4>
									<div class="row">																		
										<div class="col-sm-12 col-md-6">
											<label for="inputname" class="control-label col-form-label"><?php echo $lang['edit-courieronline7'] ?></label>
											<div class="input-group mb-3">
												<select class="form-control" id="exampleFormControlSelect1" name="origin_off" >
											<?php foreach ($office as $row_of):?>
												<option value="<?php echo $row_of->name_off; ?>"><?php echo $row_of->name_off; ?></option>
											<?php endforeach;?>
											</select>
											</div>
										</div>
										<div class="col-sm-12 col-md-6">
											<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['edit-courieronline8'] ?></i></label>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text">
														<span style="color:#ff0000" class="ti-calendar"></span>
													</span>
												</div>
												<input type='text' class="form-control" id='datetimepicker1' name="collection_courier" value="<?php echo $row->collection_courier;?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['edit-courieronline9'] ?>" />
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12 col-md-4">
											<label for="inputlname" class="control-label col-form-label"><?php echo $lang['edit-courieronline11'] ?> <i style="color:#ff0000" class="fas fa-boxes"></i></label>
											<div class="input-group">
												<input class="form-control" name="package" value="<?php echo $row->package;?>">	
											</div>
										</div>
										<div class="col-sm-12 col-md-4">
											<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['edit-courieronline12'] ?></label>
											<div class="input-group">
												<input class="form-control" name="courier" value="<?php echo $row->courier;?>">
											</div>
										</div>										
										<div class="col-sm-12 col-md-4">
											<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['edit-courieronline13'] ?> <i style="color:#ff0000" class="fas fa-shipping-fast"></i></label>
											<div class="input-group">
												<select class="custom-select col-12" name="status_courier">
												<option value="Approved"><?php echo $lang['edit-courieronline14'] ?></option>
											</select>
											</div>
										</div>								                                     
									</div>
									<div class="row"> 									
										<div class="col-sm-12 col-md-4">
											<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['edit-courieronline15'] ?></label>
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><i class="icon-clock"></i></span>
												</div>
												<input type="text" class="form-control" name="deli_time" value="<?php echo $row->deli_time;?>">
											</div>
										</div>

										<div class="col-sm-12 col-md-4">
											<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['edit-courieronline16'] ?></label>
											<div class="input-group mb-3">
												<input class="form-control" name="service_options" value="<?php echo $row->service_options;?>">
											</div>
										</div>
										
										<div class="col-sm-12 col-md-4">
											<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['edit-courieronline17'] ?> <i style="color:#ff0000" class="fas fa-donate"></i></label>
											<div class="input-group mb-3">
												<input class="form-control" name="pay_mode" value="<?php echo $row->pay_mode;?>">
											</div>
										</div>
									</div>
									<hr>
									<div class="form-actions">
										<div class="card-body">
											<div class="row">
												<div class="col-md-12">
													<div class="row">
														<div class="col-md-offset-3 col-md-9">
															<button type="submit" name="dosubmit" class="btn btn-success"> <i class="ti-reload"></i>&nbsp; <?php echo $lang['edit-courieronline18'] ?>t</button>
															<a href="index.php" class="btn btn-dark"><i class="icon-action-undo"></i> <?php echo $lang['edit-courieronline19'] ?></a> 
														</div>
													</div>
												</div>
												<div class="col-md-6"> </div>
											</div>
										</div>
									</div>
									<input name="act_status"  value="1" type="hidden">
									<input name="id" type="hidden" value="<?php echo Filter::$id;?>" />
									<input name="order_inv" type="hidden" value="<?php echo $row->order_inv;?>" />
								</div>
							</div>
						</div>

						<div class="col-sm-12 col-lg-6">
							<div class="card">
								<div class="card-body">
								<h4 class="card-title"><?php echo $lang['edit-courieronline20'] ?></h4>
								
									<div class="row">
										<div class="col-sm-12 col-md-4">										
											<label for="inputcom" class="control-label col-form-label"><?php echo $lang['edit-courieronline21'] ?></label>	
											<div class="input-group mb-4">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1" style="color:#ff0000"><?php echo $row->letter_or;?></span>
											</div>	
												<input type="text" class="form-control" name="tracking" value="<?php echo $row->tracking;?>" disabled>
											</div>
										</div>

										<div class="col-sm-12 col-md-2">
											<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['edit-courieronline22'] ?></label>
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><i class="fas fa-percent" style="color:#36bea6"></i></span>
												</div>
												<input type="number" class="form-control" onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();"  id="sum3" name="r_tax" value="<?php echo $row->r_tax;?>">
											</div>
										</div>
										<div class="col-sm-12 col-md-2">
											<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['edit-courieronline23'] ?></label>
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><i class="fas fa-percent" style="color:#36bea6"></i></span>
												</div>
												<input type="number" class="form-control"  onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();" id="sum5" name="r_insurance" value="<?php echo $row->r_insurance;?>">											
											</div>
										</div>
									</div>
									<div class="row"></br></div>
									<div class="card-body bg-light">
										<div class="row"> 
											<div class="col-sm-12 col-md-4">
												<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['edit-courieronline24'] ?></label>
												<div class="input-group">
													<input class="form-control" name="itemcat" value="<?php echo $row->itemcat;?>">
												</div>
											</div> 
											<div class="col-sm-12 col-md-2">
												<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['edit-courieronline25'] ?></label>
												<div class="input-group">
													<input type="text" data-toggle="tooltip" data-placement="bottom" title="Number of Packages" class="form-control" name="r_qnty" value="<?php echo $row->r_qnty;?>">
												</div>
											</div>
											<div class="col-sm-12 col-md-2">
												<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['edit-courieronline26'] ?></label>
												<div class="input-group">
													<input type="text" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['edit-courieronline27'] ?>" class="form-control" onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();"  id="sum4" name="r_weight" value="<?php echo $row->r_weight;?>">
												</div>
											</div>
											<div class="col-sm-12 col-md-4">
												<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['edit-courieronline28'] ?></label>
												<div class="input-group">
													 <textarea class="form-control" rows="2" name="r_description" placeholder="<?php echo $lang['edit-courieronline29'] ?>"><?php echo $row->r_description;?></textarea>
												</div>
											</div>
										</div>
										<div class="row"> </br></br></div>
										<div class="row">
											<div class="col-sm-12 col-md-6">
												<label for="inputlname" class="control-label col-form-label"><?php echo $lang['edit-courieronline30'] ?> <i class="ti-package" style="color:#36bea6"></i> <?php echo $lang['edit-courieronline31'] ?> <b><i style="color:#FF0000" class="ti-help-alt" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['edit-courieronline32'] ?> / <?php echo $core->meter;?> = kg"></i></b></label>
												<div class="input-group">
													<!-- input box for Length -->
													<input type="number" class="form-control" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['edit-courieronline33'] ?>"  onblur="if(this.value == ''){this.value='0'}"  onKeyUp="suma();" id="l1" name="length" value="<?php echo $row->length;?>">
													<div class="cross strong text__color-gray-darker text__size-smaller">&nbsp; x &nbsp;</div>
													<!-- input box for width -->
													<input type="number" class="form-control" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['edit-courieronline34'] ?>"  onblur="if(this.value == ''){this.value='0'}"  onKeyUp="suma();" id="w2" name="width" value="<?php echo $row->width;?>">
													<div class="cross strong text__color-gray-darker text__size-smaller">&nbsp; x &nbsp;</div>
													<!-- input box for height -->
													<input type="number" class="form-control" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['edit-courieronline35'] ?>"  onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();" id="h3" name="height" value="<?php echo $row->height;?>">
													<input type="number" class="form-control" id="vol" value="0" name="v_weight" value="<?php echo $row->v_weight;?>" style="display:none">
												</div>
											</div>
											<div class="col-sm-12 col-md-3">
												<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['edit-courieronline37'] ?> <b><i style="color:#FF0000" class="ti-help-alt" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['edit-courieronline36'] ?>"></i></b></label>
												<div class="input-group">
													<input type="number" class="form-control" onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();" id="sum2" name="r_custom" value="<?php echo $row->r_custom;?>">
												</div>
											</div>
											<div class="col-sm-12 col-md-3">
												<label for="inputname" class="control-label col-form-label"><?php echo $lang['edit-courieronline38'] ?></label>
												<input class="form-control" name="r_curren" value="<?php echo $row->r_curren;?>" readonly>
											</div>
										</div>									
									</div>
									<hr class="m-t-0 m-b-5">
									<div class="card-body">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="control-label text-left col-md-5"><?php echo $lang['edit-courieronline39'] ?> &nbsp; <b><?php echo $core->currency;?></b></label>
													<div class="col-md-6">
														<p class="form-control-static"> <input type="text" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['edit-courieronline40'] ?>" class="form-control" name="r_costtotal" id="total_result" value="<?php echo $row->r_costtotal;?>" readonly> </p>
													</div>
												</div>
											</div>
											<!--/span-->
										</div>
									</div>								
								</div>
							</div>
						</div>
					</div>
				</form>
                <!-- End row -->
            </div>
			<?php echo Core::doForm("processUCourier");?>
			<?php break;?>
			<?php endswitch;?>
			
			<div class="col-sm-12 col-lg-6">
				<div class="card">
					<div class="card-body">
					<h4 class="card-title"><?php echo $lang['edit-courieronline41'] ?></h4>
			
						<?php if($row->status_courier !='Rejected' AND $row->status_courier !='Approved'){?>
						<table border="0" align="center" width="50%">
							<br><br>
							<form id="readmin_form" method="post">
							
								<fieldset class="col-md-12">
									<!-- Text area -->
									<div class="form-group">
										<label for="inputTextarea" class="control-label"><i class="fa fa-comments icon text-default-lter"></i><?php echo $lang['edit-courieronline42'] ?> <?php echo  $row->email; ?>  )</label>
										<textarea class="form-control" name="reasons"></textarea>
										<input name="status_courier"  value="Rejected" type="hidden" >
										<input name="act_status"  value="0" type="hidden">
										<input name="id" type="hidden" value="<?php echo Filter::$id;?>" />
									</div>
								</fieldset>
								<br>			
								<div class="col-md-12 text-left">
									<button type="submit" name="dosubmit" class="btn btn-danger"> <i class="ti-reload"></i>&nbsp; <?php echo $lang['edit-courieronline43'] ?></button>
								</div>
							 </form>
							 <?php echo Core::reForm("processCourierrejected");?>
						</table>									  
					   <?php } ?>	
					</div>
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

		<!--Datetimepicker -->
		
		<?php include 'datetimepicker.php'; ?>

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
		$(document).ready(function () {
			$('a.activate').on('click', function () {
				var uid = $(this).attr('id').replace('act_', '')
				var text = "<i class=\"icon-warning-sign icon-3x pull-left\"></i>Are you sure you want to activate this user account?<br /><strong>Email notification will be sent as well</strong>";
				new Messi(text, {
					title: "Activate User Account",
					modal: true,
					closeButton: true,
					buttons: [{
						id: 0,
						label: "Activate",
						val: 'Y'
					}],
					  callback: function (val) {
						  $.ajax({
							  type: 'post',
							  url: "controller.php",
							  data: {
								  activateAccount: 1,
								  id: uid,
							  },
							  cache: false,
							  beforeSend: function () {
								  showLoader();
							  },
							  success: function (msg) {
								  hideLoader();
								  $("#msgholder").html(msg);
								  $('html, body').animate({
									  scrollTop: 0
								  }, 600);
							  }
						  });
					  }
				});
			});
			$("#search-input").on("keyup", function () {
				var srch_string = $(this).val();
				var data_string = 'userSearch=' + srch_string;
				if (srch_string.length > 3) {
					$.ajax({
						type: "POST",
						url: "controller.php",
						data: data_string,
						beforeSend: function () {
							$('#search-input').addClass('loading');
						},
						success: function (res) {
							$('#suggestions').html(res).show();
							$("input").blur(function () {
								$('#suggestions').fadeOut();
							});
							if ($('#search-input').hasClass("loading")) {
								$("#search-input").removeClass("loading");
							}
						}
					});
				}
				return false;
			});
			var dates = $('#fromdate, #enddate').datepicker({
				defaultDate: "+1w",
				changeMonth: false,
				numberOfMonths: 2,
				dateFormat: 'yy-mm-dd',
				onSelect: function (selectedDate) {
					var option = this.id == "fromdate" ? "minDate" : "maxDate";
					var instance = $(this).data("datepicker");
					var date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
					dates.not(this).datepicker("option", option, date);
				}
			});
		});
		// ]]>
		</script>
		
</body>

</html>
