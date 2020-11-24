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
	
    <title><?php echo $lang['conlist-title24'] ?> | <?php echo $core->site_name ?></title>
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
		   
		<?php $row = Core::getRowById(Users::uTable, Filter::$id); ?>	
		<?php $office = $core->getOffices(); ?>
		<?php $linerow = $core->getShipline(); ?>
		<?php $statusrow = $core->getStatus(); ?>
		<?php $packrow = $core->getPack(); ?>
		<?php $payrow = $core->getPayment(); ?>
		<?php $itemrow = $core->getItem(); ?>
		<?php $incorow = $core->getIncoterms();?>
		
		<?php 
			$sql = "SELECT * FROM detail_container_tmp";
			$result = $db->query($sql);
			$fila = $result->fetch_assoc();
			$id_con=$fila['idcon'];
		?>
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
						<?php echo $lang['conlist-title25'] ?> <b><?php echo $row->fname;?> <?php echo $row->lname;?></b>
                    </div>
                </div>
				<?php include 'head_courier.php'; ?>
            </div>

            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- row -->
								<div class="col-sm-12 col-lg-12">
					 <div class="card card-hover">
						<div class="card-body">
							<h4 class="card-title"><?php echo $lang['conlist-title65'] ?></h4>
							<div class="row">																		
								<div class="col-md-12">	
								<?php 
									if(!empty($_POST['detail_container']) and !empty($_POST['detail_qty'])){
										
										$detail_container	=	sanitize($_POST['detail_container']);		$price			=	sanitize($_POST['price']);
										$detail_qty			=	sanitize($_POST['detail_qty']);				$detail_weight	= 	sanitize($_POST['detail_weight']);					
										$total				= 	$detail_qty*$price;							$order_inv		= 	sanitize($_POST['order_inv']);	
										
											$results = $db->query("SELECT last_insert_id(id) as last FROM add_container order by id desc  limit 0,1");
											$rw=mysqli_fetch_array($results);
											$n_invoice=$rw['last']+1;	
										
											if(!empty($_POST['id'])){
												$id	=	$_POST['id'];
												$db->query("UPDATE detail_container_tmp SET order_inv='$order_inv', detail_container='$detail_container', price='$price', detail_qty='$detail_qty', 
												detail_weight='$detail_weight', tprice='$total' WHERE id='$id'");
												echo mensajes("<strong><center>".$lang['conlist-title66']."</center></strong>","verde");
											}else{
												$results = $db->query("SELECT * FROM detail_container_tmp WHERE detail_container='$detail_container' and level='".$user->username."'");
												if($row=$results->fetch_assoc()){
													echo mensajes("<strong><center>".$lang['conlist-title67']."</center></strong>","rojo");
												}else{
													
													$insert = $db->query("INSERT INTO detail_container_tmp (idcon,order_inv,detail_container,price,detail_qty,detail_weight,tprice,created,act_status,level) VALUES 	
																											   ('$n_invoice','$order_inv','$detail_container','$price','$detail_qty','$detail_weight','$total',NOW(),'3','".$user->username."')");													   
													echo mensajes("<strong><center>".$lang['conlist-title68']."</center></strong>","verde");														   
												}
											}
										}			
									?>
									<div class="table-responsive">
										<table id="bill" class="table" >
											<thead>
												<tr class="well">
													<th width="350"><?php echo $lang['conlist-title69'] ?></th>
													<th width="110"><?php echo $lang['conlist-title70'] ?></th>
													<th width="110"><?php echo $lang['conlist-title71'] ?></th>
													<th width="130"><?php echo $lang['conlist-title72'] ?></th>
													<th><?php echo $lang['conlist-title73'] ?></th>
													<th></th>
												</tr>
											</thead>
											<form id="admin_form"  method="post" accept-charset="utf-8">
											
												 <tbody>
													<tr>
														<td><input type="text" class="form-control" name="detail_container" autocomplete="off" required></td>
														<td><input type="number" class="form-control" name="detail_qty" min="1" autocomplete="off" required value="1"></td>
														<td><input type="number" class="form-control" name="detail_weight" min="1" autocomplete="off" required value="1"></td>
														<td><input type="number" class="form-control" name="price" autocomplete="off" step="any" min="0" required value="0"></td>
														<td></td>
														<td><center><button type="submit" class="btn btn-primary" onclick="addRow($('.bill'));"><i class="ti-plus"></i></button></center></td>
													</tr>
												</tbody>
												<input type="hidden" name="order_inv" value="<?php echo $prefix;?><?php echo $track;?>">
											</form>
											<?php $ctmprow = $core->getCouriercontainer(); ?>
											<?php 
											
												$results = $db->query("SELECT * FROM detail_container_tmp");
												while($row = $results->fetch_assoc()) {
													
												$price=0;$tprice=0;	  
												$price=$price+$row['price'];
												$tprice=$tprice+$row['tprice'];
											?>

											<tr>
												<td><?php echo $row['detail_container']; ?></td>
												<td><?php echo $row['detail_qty']; ?></td>
												<td><?php echo $row['detail_weight']; ?></td>
												<td><?php echo round($row['price']); ?></td>
												<td><?php echo round($row['tprice']); ?></td>
												<td align='center'>
												<a href="#e<?php echo $row['id']; ?>" role="button" class="btn btn-default" data-toggle="modal"><i class="ti-pencil" aria-hidden="true"></i></a>												
												<a id="item_<?php echo $row['id']; ?>" data-rel="<?php echo $row['detail_container']; ?>" class="btn btn-danger delete"><i class="ti-close"></i></a>
												</td>
											</tr>
											
											<!-- Modal edit detail container -->
											<div class="panel-body">
												<div id="e<?php echo $row['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title">Modal Content is Responsive</h4>
																<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
															</div>
															<form id="admin_form" action="" method="post">
																<div class="modal-body">
																	<div class="row">
																		<div class="col-sm-6">
																			<strong><?php echo $lang['conlist-title74'] ?></strong><br>
																			<input class="form-control" type="text" name="detail_container" autocomplete="off" required value="<?php echo $row['detail_container']; ?>"><br>																			
																			<strong><?php echo $lang['conlist-title75'] ?></strong><br>
																			<input class="form-control" type="number" name="detail_qty" min="1" autocomplete="off" required value="<?php echo $row['detail_qty']; ?>"><br>
																			<strong><?php echo $lang['conlist-title76'] ?></strong><br>
																			<input class="form-control" type="number" name="detail_weight" step="any" min="0" autocomplete="off" required value="<?php echo $row['detail_weight']; ?>"><br>
																		</div>
																		<div  class="col-sm-6">
																			<strong><?php echo $lang['conlist-title77'] ?></strong><br>    
																			<input class="form-control" type="number" name="price" step="any" min="0" autocomplete="off" required value="<?php echo $row['price']; ?>"><br>																			
																		</div>
																		<div  class="col-sm-6" style="display: none;">																			
																			<strong>Price</strong><br>    
																			<input class="form-control" type="text" name="order_inv" step="any" min="0" autocomplete="off" required value="<?php echo $row['order_inv']; ?>"><br>																			
																		</div>
																		<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
																	</div>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><i class="ti-close" aria-hidden="true"></i> <?php echo $lang['conlist-title79'] ?></button>
																	<button type="submit" class="btn btn-danger waves-effect waves-light"><?php echo $lang['conlist-title78'] ?></button>
																</div>
															</form>
														</div><!-- /.modal-content -->
													</div><!-- /.modal-dialog -->
												</div><!-- /.modal -->
											</div>
											 <!-- /.Modal edit detail container -->							
											
											<?php } ?>	
											<?php if(!$ctmprow):?>
											<tr>
												<td colspan="6">
												<?php echo "
												<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_container.png' width='280' /></i>
												</br>
												<p style='font-size: 20px; -webkit-font-smoothing: antialiased; color: #737373;' align='center'>".$lang['conlist-title80']."</p>
												<p style='font-size: 16px; -webkit-font-smoothing: antialiased; color: #999;' align='center'> ".$lang['conlist-title81']."</p>
												",false;?>
												</td>
											</tr>
											<?php endif;?>	
										</table> 
										<?php echo Core::doDelete("Delete product from the container","deleteCouriercontainer");?> 
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<form id="admin_form" method="post">
                <div class="row">
					<div class="col-sm-12 col-lg-12" style="display:none">
						 <div class="card card-hover">
							<div class="card-body">
								<h4 class="card-title">Sender Data:</h4>
								<hr>
								<div class="row">
									<div class="col-sm-12 col-md-4">
										<div class="form-group">
											<label for="inputname" class="control-label col-form-label">User Name</label>
											<input type="text" class="form-control is-valid" name="username" value="<?php echo $row->username;?>" placeholder="User Name Here">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12 col-md-6">
										<div class="form-group">
											<label for="inputname" class="control-label col-form-label">Sender Name</label>
											<input type="text" class="form-control is-valid" name="r_name" value="<?php echo $row->fname;?> <?php echo $row->lname;?>" placeholder="First Name Here">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12 col-md-6">
										<div class="form-group">
											<label for="inputEmail3" class="control-label col-form-label">Addres</label>
											<input type="text" class="form-control is-valid" name="r_address" value="<?php echo $row->address;?>" placeholder="Address">
										</div>
									</div>
									<div class="col-sm-12 col-md-3">
										<div class="form-group">
											<label for="inputcontact" class="control-label col-form-label">Phone</label>
											<input type="number" class="form-control is-valid" name="r_phone" value="<?php echo $row->phone;?>"" placeholder="Phone">
										</div>
									</div>
									<div class="col-sm-12 col-md-3">
										<div class="form-group">
											<label for="inputEmail3" class="control-label col-form-label">Origin</label>
											<input type="text" class="form-control is-valid" name="r_dest" value="<?php echo $row->country;?>" placeholder="Origin">
										</div>
									</div>                                       
								</div>
								<div class="row"> 
									<div class="col-sm-12 col-md-3">
										<div class="form-group">
											<label for="inputcontact" class="control-label col-form-label">City</label>
											<input type="text" class="form-control is-valid" name="r_city" value="<?php echo $row->city;?>" placeholder="City">
										</div>
									</div>
								
									<div class="col-sm-12 col-md-3">
										<div class="form-group">
											<label for="inputEmail3" class="control-label col-form-label">Postal Code</label>
											<input type="text" class="form-control is-valid" name="r_postal" value="<?php echo $row->postal;?>" placeholder="Postal Code">
										</div>
									</div>
									<div class="col-sm-12 col-md-6">
										<div class="form-group">
											<label for="inputcontact" class="control-label col-form-label">Email</label>
											<input type="email" class="form-control is-valid" name="r_email" value="<?php echo $row->email;?>" placeholder="Email">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-lg-12">
						 <div class="card">
							<div class="card-body">
								<h4 class="card-title"><?php echo $lang['conlist-title26'] ?></h4>
								<div class="row">									
									<div class="col-sm-12 col-md-6" style="display:none">
										<div class="form-group">
											<label for="inputname" class="control-label col-form-label">Staff Role*</label>
											<input type="text" class="form-control" name="level" value="<?php echo $user->username; ?>" placeholder="Staff Role" disabled>
										</div>
									</div>										
									<div class="col-sm-12 col-md-3">
										<label for="inputname" class="control-label col-form-label"><?php echo $lang['conlist-title27'] ?></label>
										<div class="input-group mb-3">
											<input class="form-control" id="exampleFormControlSelect1" name="origin_port" placeholder="<?php echo $lang['conlist-title28'] ?>">
										</div>
									</div>
									<div class="col-sm-12 col-md-3">
										<label for="inputname" class="control-label col-form-label"><?php echo $lang['conlist-title29'] ?></label>
										<div class="input-group mb-3">
											<input class="form-control" id="exampleFormControlSelect1" name="destination_port" placeholder="<?php echo $lang['conlist-title30'] ?>" >
										</div>
									</div>
									<div class="col-sm-12 col-md-3">
										<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['conlist-title31'] ?></i></label>
										<div class="input-group">
											<input type="text" class="form-control" name="s_week" placeholder="<?php echo $lang['conlist-title32'] ?>" value="<?php echo $numeroSemana = date("W");  ?>" />
										</div>
									</div>
									<div class="col-sm-12 col-md-3">
										<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['conlist-title33'] ?></i></label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">
													<span style="color:#ff0000" class="ti-calendar"></span>
												</span>
											</div>
											<input type='text' class="form-control" id='datetimepicker1' name="expiration_date" placeholder="Default Pickadate" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['add-title16'] ?>" />
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12 col-md-3">
										<label for="inputlname" class="control-label col-form-label"><?php echo $lang['conlist-title35'] ?> <i style="color:#ff0000" class="fas fa-boxes"></i></label>
										<div class="input-group">
											<input class="custom-select col-12" name="package" placeholder="Select Package" list="browserr" autocomplete="off" required="required">
											<datalist id="browserr">
												<?php foreach ($packrow as $row):?>
												<option value="<?php echo $row->name_pack; ?>"><?php echo $row->name_pack; ?></option>
												<?php endforeach;?>
											</datalist>	
										</div>
									</div>
									<div class="col-sm-12 col-md-3">
										<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['conlist-title36'] ?></label>
										<div class="input-group">
											<input class="custom-select col-12" name="courier" placeholder="Select Courier" list="browserssss" autocomplete="off" required="required">
											<datalist id="browserssss">
												<?php foreach ($linerow as $row):?>
												<option value="<?php echo $row->ship_line; ?>"><?php echo $row->ship_line; ?></option>
												<?php endforeach;?>
											</datalist>
										</div>
									</div>
									<div class="col-sm-12 col-md-3">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['conlist-title37'] ?></label>
										<div class="input-group mb-3">
											<select class="custom-select col-12" name="ship_mode">
												<option value="<?php echo $lang['conlist-title38'] ?>"><?php echo $lang['conlist-title38'] ?></option>
												<option value="<?php echo $lang['conlist-title39'] ?>"><?php echo $lang['conlist-title39'] ?></option>
												<option value="<?php echo $lang['conlist-title40'] ?>"><?php echo $lang['conlist-title40'] ?></option>
											</select>	
										</div>
									</div>
									<div class="col-sm-12 col-md-3">
										<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['conlist-title41'] ?> <i style="color:#ff0000" class="mdi mdi-ferry"></i></label>
										<div class="input-group">
											<select class="custom-select col-12" name="status_courier">
												<?php foreach ($statusrow as $row):?>
												<option value="<?php echo $row->mod_style; ?>"><?php echo $row->mod_style; ?></option>
												<?php endforeach;?>
											</select>
										</div>
									</div>								                                     
								</div>
								<div class="row"> 									
									<div class="col-sm-12 col-md-3">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['conlist-title42'] ?></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1"><i class="icon-clock"></i></span>
											</div>
											<input type="text" class="form-control" name="deli_time" Value="<?php echo $lang['conlist-title43'] ?>">
										</div>
									</div>

									<div class="col-sm-12 col-md-3">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['conlist-title44'] ?></label>
										<div class="input-group mb-3">
											<input class="custom-select col-12" name="incoterms" placeholder="Select Incoterms" list="browserss" autocomplete="off" required="required">
											<datalist id="browserss">
												<?php foreach ($incorow as $row):?>
												<option value="<?php echo $row->inco_name; ?>"><?php echo $row->inco_name; ?></option>
												<?php endforeach;?>
											</datalist>	
										</div>
									</div>
									
									<div class="col-sm-12 col-md-3">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['conlist-title45'] ?> <i style="color:#ff0000" class="fas fa-donate"></i></label>
										<div class="input-group mb-3">
											<input class="custom-select col-12" name="pay_mode" placeholder="Select Pay Mode" list="browsersss" autocomplete="off" required="required">
											<datalist id="browsersss">
												<?php foreach ($payrow as $row):?>
												<option value="<?php echo $row->met_payment; ?>"><?php echo $row->met_payment; ?></option>
												<?php endforeach;?>
											</datalist>	
										</div>
									</div>
									<div class="col-sm-12 col-md-3">
											<label for="inputname" class="control-label col-form-label"><?php echo $lang['conlist-title46'] ?></label>
											<input class="custom-select col-12" name="r_curren" placeholder="Select Currency" list="browsers" autocomplete="off" required="required">
											<datalist id="browsers">
												<option value="" disabled=""><?php echo $lang['conlist-title46'] ?></option>
												<option label="AED" value="AED">AED</option>
												<option label="ARS" value="ARS">ARS</option>
												<option label="AUD" value="AUD">AUD</option>
												<option label="BGN" value="BGN">BGN</option>
												<option label="BND" value="BND">BND</option>
												<option label="BOB" value="BOB">BOB</option>
												<option label="BRL" value="BRL">BRL</option>
												<option label="CAD" value="CAD">CAD</option>
												<option label="CHF" value="CHF">CHF</option>
												<option label="CLP" value="CLP">CLP</option>
												<option label="CNY" value="CNY">CNY</option>
												<option label="COP" value="COP">COP</option>
												<option label="CZK" value="CZK">CZK</option>
												<option label="DKK" value="DKK">DKK</option>
												<option label="EGP" value="EGP">EGP</option>
												<option label="EUR" value="EUR">EUR</option>
												<option label="FJD" value="FJD">FJD</option>
												<option label="GBP" value="GBP">GBP</option>
												<option label="HKD" value="HKD">HKD</option>
												<option label="HRK" value="HRK">HRK</option>
												<option label="HUF" value="HUF">HUF</option>
												<option label="IDR" value="IDR">IDR</option>
												<option label="ILS" value="ILS">ILS</option>
												<option label="INR" value="INR">INR</option>
												<option label="JPY" value="JPY">JPY</option>
												<option label="KES" value="KES">KES</option>
												<option label="KRW" value="KRW">KRW</option>
												<option label="LTL" value="LTL">LTL</option>
												<option label="MAD" value="MAD">MAD</option>
												<option label="MXN" value="MXN">MXN</option>
												<option label="MYR" value="MYR">MYR</option>
												<option label="NGN" value="NGN">NGN</option>
												<option label="NOK" value="NOK">NOK</option>
												<option label="NZD" value="NZD">NZD</option>
												<option label="PEN" value="PEN">PEN</option>
												<option label="PHP" value="PHP">PHP</option>
												<option label="PKR" value="PKR">PKR</option>
												<option label="PLN" value="PLN">PLN</option>
												<option label="RON" value="RON">RON</option>
												<option label="RSD" value="RSD">RSD</option>
												<option label="RUB" value="RUB">RUB</option>
												<option label="SAR" value="SAR">SAR</option>
												<option label="SEK" value="SEK">SEK</option>
												<option label="SGD" value="SGD">SGD</option>
												<option label="THB" value="THB">THB</option>
												<option label="TRY" value="TRY">TRY</option>
												<option label="TWD" value="TWD">TWD</option>
												<option label="UAH" value="UAH">UAH</option>
												<option label="USD" value="USD" selected="selected">USD</option>
												<option label="VEF" value="VEF">VEF</option>
												<option label="VND" value="VND">VND</option>
												<option label="ZAR" value="ZAR">ZAR</option>
											</datalist>
										</div>
								</div>
							</div>
						</div>
					</div>
					
					<?php $track = $courier->container_track();?>
					<?php $prefix = $courier->container_prefix();?>
					<div class="col-sm-12 col-lg-6">
						 <div class="card card-hover">
							<div class="card-body">
							<h4 class="card-title"><?php echo $lang['conlist-title47'] ?></h4>
								<div class="row">
									<div class="col-sm-12 col-md-6">										
										<label for="inputcom" class="control-label col-form-label"><?php echo $lang['conlist-title48'] ?></label>
										<div class="input-group mb-6">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1" style="color:#ff0000"><?php echo $prefix;?></span>
											</div>	
											<input type="text" class="form-control" name="tracking" value="<?php echo $track;?>">
										</div>
									</div>

									<div class="col-sm-12 col-md-3">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['conlist-title49'] ?></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1"><i class="fas fa-percent" style="color:#36bea6"></i></span>
											</div>
											<input type="number" class="form-control" onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();"  id="sum3" name="r_tax" value="<?php echo $core->tax;?>">
										</div>
									</div>
									<div class="col-sm-12 col-md-3">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['conlist-title50'] ?></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1"><i class="fas fa-percent" style="color:#36bea6"></i></span>
											</div>
											<input type="number" class="form-control"  onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();" id="sum5" name="r_insurance" value="<?php echo $core->insurance;?>">											
										</div>
									</div>
								</div>
								<div class="card-body bg-light">
									<div class="row">										
										<div class="col-sm-12 col-md-12">
											<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['conlist-title51'] ?></label>
											<div class="input-group">
												 <textarea class="form-control" rows="3" name="s_description" placeholder="<?php echo $lang['conlist-title52'] ?>"></textarea>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-sm-12 col-lg-6">
						 <div class="card card-hover">
							<div class="card-body">
								<div class="card-body">
									<div class="row">
										<div class="col-sm-12 col-md-12">
											<label for="inputlname" class="control-label col-form-label"><?php echo $lang['conlist-title53'] ?> <i class="mdi mdi-view-week" style="color:#36bea6"></i> <?php echo $lang['conlist-title54'] ?> <b><i style="color:#FF0000" class="ti-help-alt" data-toggle="tooltip" data-html="true" data-placement="top" title="-20 Pies Standard 20´ x 8´ x 8´6″.<br>-40 Pies Standard 40´ x 8´ x 8´6″.<br>-40 Pies High Cube 40´ x 8´ x 9´6″."></i></b></label>
											<div class="input-group">
												<!-- input box for Length -->
												<input type="number" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['conlist-title55'] ?>" class="form-control" onblur="if(this.value == ''){this.value='0'}"  onKeyUp="suma();" id="l1" value="0" name="length">
												<div class="cross strong text__color-gray-darker text__size-smaller">&nbsp; x &nbsp;</div>
												<!-- input box for width -->
												<input type="number" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['conlist-title56'] ?>" class="form-control" onblur="if(this.value == ''){this.value='0'}"  onKeyUp="suma();" id="w2" value="0" name="width">
												<div class="cross strong text__color-gray-darker text__size-smaller">&nbsp; x &nbsp;</div>
												<!-- input box for height -->
												<input type="number" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['conlist-title57'] ?>" class="form-control" onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();" id="h3" value="0" name="height">
											</div>
										</div>
										<div class="col-sm-12 col-md-6">
											<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['conlist-title58'] ?> <b><i class="mdi mdi-weight" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['conlist-title59'] ?>"></i></b></label>
											<div class="input-group">
												<input type="number" class="form-control" name="n_weight" placeholder="Net weight...">
											</div>
										</div>
									
										<div class="col-sm-12 col-md-6">
											<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['conlist-title60'] ?> <b><i class="mdi mdi-weight-kilogram" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['conlist-title61'] ?>"></i></b></label>
											<div class="input-group">
												<input type="number" class="form-control" name="g_weight" placeholder="<?php echo $lang['conlist-title62'] ?>">
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
														<button type="submit" name="dosubmit" class="btn btn-success"> <i class="mdi mdi-view-week"></i>&nbsp; <?php echo $lang['conlist-title63'] ?></button>
														<a href="client_container.php" class="btn btn-dark"><i class="icon-action-undo"></i> <i class="icon-people"></i> <?php echo $lang['conlist-title64'] ?></a> 
													</div>
												</div>
											</div>
											<div class="col-md-6"> </div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<input name="idcon" type="hidden" value="<?php echo $id_con; ?>" />
				</form>
                <!-- End row -->
				</div>
            </div>
			<?php echo Core::doForm("processContainer");?>
				
			
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
		
</body>

</html>