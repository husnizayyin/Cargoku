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
<html dir="ltr" lang="en" ng-app="app">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../uploads/favicon.png">
	
    <title><?php echo $lang['langs_051'] ?> | <?php echo $core->site_name ?></title>
    <!-- This page plugin CSS -->

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
	<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
</head>

<body ng-controller="memberdata" ng-init="fetch()">

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
                    </div>
                </div>
				<?php include 'head_courier.php'; ?>
            </div>

            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- row -->
				<div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <form action = "assets/add_package/import.php" method="post" enctype = "multipart/form-data">
                                <div class="card-body">
                                    <h4 class="card-title"><?php echo $lang['langs_053'] ?>:</h4>
                                </div>
                                <hr>
                                <div class="form-body">
                                    <div class="card-body">
                                        <div class="row p-t-0">
                                            <div class="col-md-6">
                                                <div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text">Upload</span>
													</div>
													<div class="custom-file">
														<input type="file" name="file" id="file" class="custom-file-input" id="inputGroupFile01">
														<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
													</div>
													<button type="submit" name="save" class="btn btn-dark button-loading" data-loading-text="Loading..."><span class = "ti ti-export"></span> <?php echo $lang['langs_054'] ?></button>
												</div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    
                                                    <a href="assets/add_package/import_consolidated.csv"><img src="assets/add_package/csv.png"  height="40" width="38"> &nbsp;&nbsp;<?php echo $lang['langs_055'] ?></a>
												</div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
									</div>
								</div>	
                            </form>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 col-lg-12">
						<div class="card">
							<div class="card-body">
							<h4 class="card-title"><?php echo $lang['langs_052'] ?></h4>
								<hr>
								<div class="alert alert-success text-center" ng-show="success">
									<button type="button" class="close" ng-click="clearMessage()"><span aria-hidden="true">&times;</span></button>
									<i class="fa fa-check"></i> {{ successMessage }}
								</div>
								<div class="alert alert-danger text-center" ng-show="error">
									<button type="button" class="close" ng-click="clearMessage()"><span aria-hidden="true">&times;</span></button>
									<i class="fa fa-warning"></i> {{ errorMessage }}
								</div>
								<form name="addForm" novalidate>
									<fieldset ng-repeat="memberfield in memberfields">
										<div class="panel panel-default">
											<div class="panel-body">
												<div class="row">
													<div class="col-md-2">
														<input type="text" placeholder="<?php echo $lang['langs_056'] ?>" class="form-control m-t-20" ng-model="memberfield.order_inv" required>
													</div>
													<div class="col-md-2">
														<input type="text" placeholder="<?php echo $lang['langs_057'] ?>" class="form-control m-t-20" ng-model="memberfield.s_name" required>
													</div>
													<div class="col-md-1">
														<input type="number" placeholder="<?php echo $lang['langs_058'] ?>" class="form-control m-t-20" ng-model="memberfield.r_qnty" required>
													</div>
													<div class="col-md-1">
														<input type="number" placeholder="<?php echo $lang['langs_059'] ?>" class="form-control m-t-20" ng-model="memberfield.r_weight" required>
													</div>
													<div class="col-md-1">
														<input type="number" placeholder="<?php echo $lang['langs_060'] ?>" class="form-control m-t-20" ng-model="memberfield.v_weight" required>
													</div>
													<div class="col-md-3">
														<input type="text" placeholder="<?php echo $lang['langs_061'] ?>" class="form-control m-t-20" ng-model="memberfield.r_description" required>
													</div>
													<div class="col-md-1">
														<input type="number" placeholder="<?php echo $lang['langs_062'] ?>" class="form-control m-t-20" ng-model="memberfield.r_costtotal" required>
													</div>
													<div class="col-md-1">
														<button class="btn btn-danger m-t-20" type="button" ng-show="$last" ng-click="removeField()"><i class="ti ti-minus"></i></button>
													</div>
												</div>
											</div>
										</div>
									</fieldset>
									</br></br>
									<button type="button" class="btn btn-primary" ng-click="newfield()"><span class="ti ti-plus"></span> <?php echo $lang['langs_063'] ?></button>
									<button type="button" class="btn btn-success" ng-disabled="addForm.$invalid" ng-click="submitForm()"><span class="ti ti-save"></span> <?php echo $lang['langs_064'] ?></button>
								</form>
							</div>
						</div>
					</div>
					
					<div class="col-sm-12 col-lg-12">
						<div class="card">
							<div class="card-body">
							<h4 class="card-title"><?php echo $lang['langs_065'] ?></h4>
								<table id="zero_config" class="table table-bordered table-condensed table-hover table-striped">
									<thead>
										<tr>
											<th><?php echo $lang['langs_066'] ?></th>
											<th><?php echo $lang['langs_067'] ?></th>
											<th>Cost Total</th>
										</tr>
									</thead>
									<tbody>
										<tr ng-repeat="member in members">
											<td>{{ member.order_inv }}</td>
											<td>{{ member.r_qnty }}</td>
											<td>{{ member.r_costtotal }}</td>
										</tr>
									</tbody>
								</table>
								</br></br>
								<a href="customerc_list.php" class="btn btn-secondary"><i class="ti ti-gift"></i> <?php echo $lang['langs_068'] ?></a> 
								<button type="button" class="btn btn-danger" ng-click="deleteUser(user)"><span class="ti ti-trash"></span> <?php echo $lang['langs_069'] ?></button>
							</div>
						</div>
					</div>
				</div>

                <!-- End row -->
            </div>
			<?php echo Core::doForm("processCourier");?>

			
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
		<script src="assets/libs/jquery/dist/jquery.min.js"></script>
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
		<script src="add_package.js"></script>
		
</body>

</html>