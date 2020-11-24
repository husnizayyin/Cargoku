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
	
    <title><?php echo $lang['langs_01'] ?> | <?php echo $core->site_name ?></title>
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
						<?php echo $lang['langs_02'] ?> <b></b>
                    </div>
                </div>
				<?php include 'head_courier.php'; ?>
            </div>
			
			<?php $track_con = $courier->ordertrack_consolidate();?>
			<?php $prefix_con = $courier->order_prefix_consolidate();?>
			<?php $driverrow = $user->getDrivers();?>
			<?php $statusrow = $core->getStatus(); ?>
			<?php $office = $core->getOffices(); ?>
			<?php $moderow = $core->getShipmode();?>
			<?php $courierrow = $core->getCouriercom(); ?>
			<?php $payrow = $core->getPayment(); ?>
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
				<div class="row">	
					<div class="col-lg-8 col-xl-8">
						 <div class="card card-hover">
							<div class="card-body">
								<h4 class="card-title"><?php echo $lang['langs_03'] ?></h4>
								<div class="row">																		
									<table class="table">
										<tr>
											<td>
												<div class="row-fluid">
													<div class="col-sm-12 form-group">
														<form name="form2" action="" method="post">
															<strong><?php echo $lang['langs_04'] ?></strong><br>
															<input type="text" autofocus list="browsers" name="buscar" autocomplete="off" class="form-control" required>
															<datalist id="browsers">
																<?php
																	$pa = $db->query("SELECT order_inv FROM  add_consolidate WHERE act_status=0
																	");				
																	while($row=mysqli_fetch_array($pa)){
																		echo '<option value="'.$row['order_inv'].'">';
																	}
																?> 
															</datalist>
														</form>
													</div>
												</div>
											</td>
										</tr>
									</table>
									
									<div class="table-responsive">
										<?php
										
											if(!empty($_POST['buscar'])){
													$buscar= $_POST['buscar'];

													$resultado = $db->query("SELECT order_inv,s_name,r_qnty,r_weight,v_weight,r_description,r_costtotal,created,r_hour FROM add_consolidate WHERE  (order_inv='$buscar' or s_name='$buscar') GROUP BY s_name");
													if($roow = mysqli_fetch_array($resultado)){	
														$order_inv=$roow['order_inv'];
														$s_name=$roow['s_name'];
														$r_qnty=$roow['r_qnty'];
														$r_weight=$roow['r_weight'];
														$v_weight=$roow['v_weight'];
														$r_description=$roow['r_description'];
														$r_costtotal=$roow['r_costtotal'];
														$created=$roow['created'];
														$r_hour=$roow['r_hour'];
														
														$results = $db->query("SELECT last_insert_id(id) as last FROM consolidate order by id desc  limit 0,1");
															$rw=mysqli_fetch_array($results);
															$n_invoice=$rw['last']+1;
														
														$results = $db->query("SELECT last_insert_id(con_tmp) as lastt FROM cons_tmp order by con_tmp desc  limit 0,1");
															$row=mysqli_fetch_array($results);
															$n_id=$row['lastt']+1;
														
														$resultados = $db->query("SELECT * FROM cons_tmp WHERE order_invs='$order_inv'");	
														if($row = mysqli_fetch_array($resultados)){
															$id=$row['id'];
															$trackings=$row['trackings'];
															$order_invs=$row['order_invs'];
															$s_names=$row['s_names'];
															$r_qntys=$row['r_qntys'];
															$r_weights=$row['r_weights'];
															$v_weights=$row['v_weights'];
															$r_descriptions=$row['r_descriptions'];
															$r_costtotals=$row['r_costtotals'];
															$createds=$row['createds'];
															$r_hours=$row['r_hours'];

														}else{
															
															$results = $db->query("SELECT * FROM cons_tmp WHERE order_cons='$order_inv' and levels='".$user->username."'");
															if($row=$results->fetch_assoc()){
																echo mensajes("<strong><center>".$lang['conlist-title67']."</center></strong>","rojo");
															}else{
															$insert = $db->query("INSERT INTO cons_tmp (idcon,con_tmp,trackings,order_invs,order_cons,s_names,r_qntys,r_weights,v_weights,r_descriptions,r_costtotals,createds,r_hours,levels) VALUES 
																	('$n_invoice','$n_id','".$track_con."','".$prefix_con."".$track_con."','$order_inv','$s_name','$r_qnty','$r_weight','$v_weight','$r_description','$r_costtotal','$created','$r_hour','".$user->username."')");

															$db->query("UPDATE add_consolidate  SET act_status='1', idcon='$n_invoice', con_tmp='$n_id' WHERE order_inv='$order_inv'");		
																	
														}
														echo mensajes("<strong><center>".$lang['langs_05']."</center></strong>","verde"); 
													}				
												}
											}
										?>
										
										<table class="tablesaw table-striped table-hover table-bordered table" data-tablesaw-mode="columntoggle">
											<tr class="well">
												<td><strong><center><?php echo $lang['langs_06'] ?></center></strong></td>
												<td><strong><center><?php echo $lang['langs_07'] ?></center></strong></td>
												<td><strong><center><?php echo $lang['langs_08'] ?></center></strong></td>
												<td><strong><center><?php echo $lang['langs_09'] ?></center></strong></td>
												<td></td>
											</tr>
											<?php 
												$netos=0;$items=0;
												$sql = "SELECT * FROM cons_tmp";
												$result = $db->query($sql);
												$fila = $result->fetch_assoc();
												$items=$items+$fila['r_qntys'];
												$id_con=$fila['idcon'];
												$netos=$items;

												$net=0;$iten=0;
												$sql = "SELECT COUNT(*) total FROM cons_tmp";
												$result = $db->query($sql);
												$fila = $result->fetch_assoc();
												$iten=$iten+$fila['total'];	
												$net=$iten;

												
												$neto=0;$item=0;$neto1=0;$item1=0;
												$results = $db->query("SELECT a.id,a.con_tmp,a.order_cons,b.order_inv,a.s_names,a.r_descriptions,a.r_costtotals,a.v_weights,a.r_weights
												FROM cons_tmp a, add_consolidate b WHERE a.order_cons=b.order_inv");	
												while($row = $results->fetch_assoc()) {
													$item=$item+$row['r_weights'];
													$neto=$item;

											?>
											<tr>
												<td><center><?php echo $row['order_inv']; ?></center></td>
												<td><center><?php echo $row['s_names']; ?></center></td>
												<td><center><?php echo $row['r_descriptions']; ?></center></td>
												<td><center><?php echo  $row['r_weights']; ?></center></td>							
												<td>
													<a id="item_<?php echo $row['con_tmp']; ?>" data-rel="<?php echo $row['r_descriptions']; ?>" class="btn btn-danger delete"><i class="ti-close"></i></a>
												</td>
											</tr>
											
											<?php } ?>
										</table>
										<?php echo Core::doDelete("Delete product from the consolidate","deleteConsolidate");?> 
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php $row = Core::getRowById(Users::uTable, Filter::$id); ?>
					<div class="col-lg-4 col-xl-4">
						<div class="card card-hover">
							<div class="card-body">
								<div class="card-body">
								<h3 class="card-subtitle"><i class="icon-people"></i> <?php echo $lang['langs_010'] ?></h3>
								</br>
								<small class="text-muted"><?php echo $lang['langs_011'] ?> </small>
                                <h6><b><?php echo $row->fname;?> <?php echo $row->lname;?></b></h6> 
								<small class="text-muted"><?php echo $lang['langs_012'] ?> </small>
                                <h6><?php echo $row->email;?></h6> 
								<small class="text-muted p-t-30 db"><?php echo $lang['langs_013'] ?></small>
                                <h6><?php echo $row->phone;?></h6> 
								<small class="text-muted p-t-30 db"><?php echo $lang['langs_014'] ?></small>
                                <h6><?php echo $row->address;?></h6>
                                <br/>
									<div class="row">
										<div class="col-sm-12 col-md-12">
											<table class="table table-bordered">
												<tr>
													<td>
														<center><strong><?php echo $lang['langs_015'] ?></strong>
														<pre><h2 class="text-success" align="center"><?php echo $neto; ?></h2></pre>
														<strong><?php echo $lang['langs_016'] ?>: <br><span class="btn btn-secondary btn-circle">
														<?php echo $netos; ?>
														</span></strong></center>
													</td>
												</tr>
											</table>
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
														<a href="#con-close-modal" role="button" class="btn btn-success" data-toggle="modal">
															<i class="mdi mdi-gift"></i> <strong><?php echo $lang['langs_017'] ?></strong>
														</a>
														<a href="customerc_list.php" class="btn btn-dark"><i class="icon-action-undo"></i> <i class="icon-people"></i> <?php echo $lang['conlist-title64'] ?></a> 
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
				</div>	
			</div>
        </div>
		
		<div id="con-close-modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
			<div class="modal-dialog modal-lg">			
				<div class="modal-content">
				<?php include 'head_courier.php'; ?>
				<form id="admin_form" method="post">
					<div class="modal-header"> 
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
						<h3 class="modal-title"><?php echo $lang['langs_018'] ?></h3> 
					</div> 
					<div class="modal-body">
						<div class="row">
							<div class="col-md-2"> 
								<div class="form-group"> 
									<label for="field-2" class="control-label"><?php echo $lang['langs_019'] ?></label> 
									<input type="text" class="form-control" name="letter_or" value="<?php echo $prefix_con;?>">													
								</div> 
							</div> 
							<div class="col-md-4"> 
								<div class="form-group"> 
									<label for="field-1" class="control-label"><?php echo $lang['langs_020'] ?>:</label> 			
									<input  type="text" class="form-control" name="tracking" value="<?php echo $track_con;?>">
								</div> 
							</div> 
							<div class="col-md-6"> 
								<div class="form-group"> 
									<label for="field-2" class="control-label"><?php echo $lang['langs_021'] ?></label> 
									<input name="seals" class="form-control" placeholder="00-00000">													
								</div> 
							</div> 
						</div> 
						<div class="row" style="display:none"> 										
							<div class="col-md-8" > 
								<div class="form-group"> 
									<label for="field-2" class="control-label"><?php echo $lang['langs_022'] ?></label> 
									<input name="r_name" value="<?php echo $row->fname;?> <?php echo $row->lname;?>" class="form-control" >													
								</div> 
							</div>
							<div class="col-md-4" > 
								<div class="form-group"> 
									<label for="field-2" class="control-label"><?php echo $lang['langs_023'] ?></label> 
									<input name="username" value="<?php echo $row->username;?>" class="form-control" >													
								</div> 
							</div>
							<div class="col-md-4" > 
								<div class="form-group"> 
									<label for="field-2" class="control-label"><?php echo $lang['langs_024'] ?></label> 
									<input name="r_email" value="<?php echo $row->email;?>" class="form-control" >													
								</div> 
							</div>
							<div class="col-md-4" > 
								<div class="form-group"> 
									<label for="field-2" class="control-label"><?php echo $lang['langs_025'] ?></label> 
									<input name="r_address" value="<?php echo $row->address;?>" class="form-control" >													
								</div> 
							</div>
							<div class="col-md-4" > 
								<div class="form-group"> 
									<label for="field-2" class="control-label"><?php echo $lang['langs_026'] ?></label> 
									<input name="r_phone" value="<?php echo $row->phone;?>" class="form-control" >													
								</div> 
							</div>
						</div>
						<div class="row"> 										
							<div class="col-md-6" > 
								<div class="form-group"> 
									<label for="field-2" class="control-label"><?php echo $lang['langs_027'] ?></label> 
									<input class="form-control" name="r_dest" placeholder="<?php echo $lang['langs_027'] ?>" list="browsers7" autocomplete="off" required="required">
									<datalist id="browsers7">
										<option value="United States">United States</option> 
										<option value="United Kingdom">United Kingdom</option> 
										<option value="Afghanistan">Afghanistan</option> 
										<option value="Albania">Albania</option> 
										<option value="Algeria">Algeria</option> 
										<option value="American Samoa">American Samoa</option> 
										<option value="Andorra">Andorra</option> 
										<option value="Angola">Angola</option> 
										<option value="Anguilla">Anguilla</option> 
										<option value="Antarctica">Antarctica</option> 
										<option value="Antigua and Barbuda">Antigua and Barbuda</option> 
										<option value="Argentina">Argentina</option> 
										<option value="Armenia">Armenia</option> 
										<option value="Aruba">Aruba</option> 
										<option value="Australia">Australia</option> 
										<option value="Austria">Austria</option> 
										<option value="Azerbaijan">Azerbaijan</option> 
										<option value="Bahamas">Bahamas</option> 
										<option value="Bahrain">Bahrain</option> 
										<option value="Bangladesh">Bangladesh</option> 
										<option value="Barbados">Barbados</option> 
										<option value="Belarus">Belarus</option> 
										<option value="Belgium">Belgium</option> 
										<option value="Belize">Belize</option> 
										<option value="Benin">Benin</option> 
										<option value="Bermuda">Bermuda</option> 
										<option value="Bhutan">Bhutan</option> 
										<option value="Bolivia">Bolivia</option> 
										<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option> 
										<option value="Botswana">Botswana</option> 
										<option value="Bouvet Island">Bouvet Island</option> 
										<option value="Brazil">Brazil</option> 
										<option value="British Indian Ocean Territory">British Indian Ocean Territory</option> 
										<option value="Brunei Darussalam">Brunei Darussalam</option> 
										<option value="Bulgaria">Bulgaria</option> 
										<option value="Burkina Faso">Burkina Faso</option> 
										<option value="Burundi">Burundi</option> 
										<option value="Cambodia">Cambodia</option> 
										<option value="Cameroon">Cameroon</option> 
										<option value="Canada">Canada</option> 
										<option value="Cape Verde">Cape Verde</option> 
										<option value="Cayman Islands">Cayman Islands</option> 
										<option value="Central African Republic">Central African Republic</option> 
										<option value="Chad">Chad</option> 
										<option value="Chile">Chile</option> 
										<option value="China">China</option> 
										<option value="Christmas Island">Christmas Island</option> 
										<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option> 
										<option value="Colombia">Colombia</option> 
										<option value="Comoros">Comoros</option> 
										<option value="Congo">Congo</option> 
										<option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option> 
										<option value="Cook Islands">Cook Islands</option> 
										<option value="Costa Rica">Costa Rica</option> 
										<option value="Cote D'ivoire">Cote D'ivoire</option> 
										<option value="Croatia">Croatia</option> 
										<option value="Cuba">Cuba</option> 
										<option value="Cyprus">Cyprus</option> 
										<option value="Czech Republic">Czech Republic</option> 
										<option value="Denmark">Denmark</option> 
										<option value="Djibouti">Djibouti</option> 
										<option value="Dominica">Dominica</option> 
										<option value="Dominican Republic">Dominican Republic</option> 
										<option value="Ecuador">Ecuador</option> 
										<option value="Egypt">Egypt</option> 
										<option value="El Salvador">El Salvador</option> 
										<option value="Equatorial Guinea">Equatorial Guinea</option> 
										<option value="Eritrea">Eritrea</option> 
										<option value="Estonia">Estonia</option> 
										<option value="Ethiopia">Ethiopia</option> 
										<option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option> 
										<option value="Faroe Islands">Faroe Islands</option> 
										<option value="Fiji">Fiji</option> 
										<option value="Finland">Finland</option> 
										<option value="France">France</option> 
										<option value="French Guiana">French Guiana</option> 
										<option value="French Polynesia">French Polynesia</option> 
										<option value="French Southern Territories">French Southern Territories</option> 
										<option value="Gabon">Gabon</option> 
										<option value="Gambia">Gambia</option> 
										<option value="Georgia">Georgia</option> 
										<option value="Germany">Germany</option> 
										<option value="Ghana">Ghana</option> 
										<option value="Gibraltar">Gibraltar</option> 
										<option value="Greece">Greece</option> 
										<option value="Greenland">Greenland</option> 
										<option value="Grenada">Grenada</option> 
										<option value="Guadeloupe">Guadeloupe</option> 
										<option value="Guam">Guam</option> 
										<option value="Guatemala">Guatemala</option> 
										<option value="Guinea">Guinea</option> 
										<option value="Guinea-bissau">Guinea-bissau</option> 
										<option value="Guyana">Guyana</option> 
										<option value="Haiti">Haiti</option> 
										<option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option> 
										<option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option> 
										<option value="Honduras">Honduras</option> 
										<option value="Hong Kong">Hong Kong</option> 
										<option value="Hungary">Hungary</option> 
										<option value="Iceland">Iceland</option> 
										<option value="India">India</option> 
										<option value="Indonesia">Indonesia</option> 
										<option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option> 
										<option value="Iraq">Iraq</option> 
										<option value="Ireland">Ireland</option> 
										<option value="Israel">Israel</option> 
										<option value="Italy">Italy</option> 
										<option value="Jamaica">Jamaica</option> 
										<option value="Japan">Japan</option> 
										<option value="Jordan">Jordan</option> 
										<option value="Kazakhstan">Kazakhstan</option> 
										<option value="Kenya">Kenya</option> 
										<option value="Kiribati">Kiribati</option> 
										<option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option> 
										<option value="Korea, Republic of">Korea, Republic of</option> 
										<option value="Kuwait">Kuwait</option> 
										<option value="Kyrgyzstan">Kyrgyzstan</option> 
										<option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option> 
										<option value="Latvia">Latvia</option> 
										<option value="Lebanon">Lebanon</option> 
										<option value="Lesotho">Lesotho</option> 
										<option value="Liberia">Liberia</option> 
										<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option> 
										<option value="Liechtenstein">Liechtenstein</option> 
										<option value="Lithuania">Lithuania</option> 
										<option value="Luxembourg">Luxembourg</option> 
										<option value="Macao">Macao</option> 
										<option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option> 
										<option value="Madagascar">Madagascar</option> 
										<option value="Malawi">Malawi</option> 
										<option value="Malaysia">Malaysia</option> 
										<option value="Maldives">Maldives</option> 
										<option value="Mali">Mali</option> 
										<option value="Malta">Malta</option> 
										<option value="Marshall Islands">Marshall Islands</option> 
										<option value="Martinique">Martinique</option> 
										<option value="Mauritania">Mauritania</option> 
										<option value="Mauritius">Mauritius</option> 
										<option value="Mayotte">Mayotte</option> 
										<option value="Mexico">Mexico</option> 
										<option value="Micronesia, Federated States of">Micronesia, Federated States of</option> 
										<option value="Moldova, Republic of">Moldova, Republic of</option> 
										<option value="Monaco">Monaco</option> 
										<option value="Mongolia">Mongolia</option> 
										<option value="Montserrat">Montserrat</option> 
										<option value="Morocco">Morocco</option> 
										<option value="Mozambique">Mozambique</option> 
										<option value="Myanmar">Myanmar</option> 
										<option value="Namibia">Namibia</option> 
										<option value="Nauru">Nauru</option> 
										<option value="Nepal">Nepal</option> 
										<option value="Netherlands">Netherlands</option> 
										<option value="Netherlands Antilles">Netherlands Antilles</option> 
										<option value="New Caledonia">New Caledonia</option> 
										<option value="New Zealand">New Zealand</option> 
										<option value="Nicaragua">Nicaragua</option> 
										<option value="Niger">Niger</option> 
										<option value="Nigeria">Nigeria</option> 
										<option value="Niue">Niue</option> 
										<option value="Norfolk Island">Norfolk Island</option> 
										<option value="Northern Mariana Islands">Northern Mariana Islands</option> 
										<option value="Norway">Norway</option> 
										<option value="Oman">Oman</option> 
										<option value="Pakistan">Pakistan</option> 
										<option value="Palau">Palau</option> 
										<option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option> 
										<option value="Panama">Panama</option> 
										<option value="Papua New Guinea">Papua New Guinea</option> 
										<option value="Paraguay">Paraguay</option> 
										<option value="Peru">Peru</option> 
										<option value="Philippines">Philippines</option> 
										<option value="Pitcairn">Pitcairn</option> 
										<option value="Poland">Poland</option> 
										<option value="Portugal">Portugal</option> 
										<option value="Puerto Rico">Puerto Rico</option> 
										<option value="Qatar">Qatar</option> 
										<option value="Reunion">Reunion</option> 
										<option value="Romania">Romania</option> 
										<option value="Russian Federation">Russian Federation</option> 
										<option value="Rwanda">Rwanda</option> 
										<option value="Saint Helena">Saint Helena</option> 
										<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> 
										<option value="Saint Lucia">Saint Lucia</option> 
										<option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option> 
										<option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option> 
										<option value="Samoa">Samoa</option> 
										<option value="San Marino">San Marino</option> 
										<option value="Sao Tome and Principe">Sao Tome and Principe</option> 
										<option value="Saudi Arabia">Saudi Arabia</option> 
										<option value="Senegal">Senegal</option> 
										<option value="Serbia and Montenegro">Serbia and Montenegro</option> 
										<option value="Seychelles">Seychelles</option> 
										<option value="Sierra Leone">Sierra Leone</option> 
										<option value="Singapore">Singapore</option> 
										<option value="Slovakia">Slovakia</option> 
										<option value="Slovenia">Slovenia</option> 
										<option value="Solomon Islands">Solomon Islands</option> 
										<option value="Somalia">Somalia</option> 
										<option value="South Africa">South Africa</option> 
										<option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option> 
										<option value="Spain">Spain</option> 
										<option value="Sri Lanka">Sri Lanka</option> 
										<option value="Sudan">Sudan</option> 
										<option value="Suriname">Suriname</option> 
										<option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option> 
										<option value="Swaziland">Swaziland</option> 
										<option value="Sweden">Sweden</option> 
										<option value="Switzerland">Switzerland</option> 
										<option value="Syrian Arab Republic">Syrian Arab Republic</option> 
										<option value="Taiwan, Province of China">Taiwan, Province of China</option> 
										<option value="Tajikistan">Tajikistan</option> 
										<option value="Tanzania, United Republic of">Tanzania, United Republic of</option> 
										<option value="Thailand">Thailand</option> 
										<option value="Timor-leste">Timor-leste</option> 
										<option value="Togo">Togo</option> 
										<option value="Tokelau">Tokelau</option> 
										<option value="Tonga">Tonga</option> 
										<option value="Trinidad and Tobago">Trinidad and Tobago</option> 
										<option value="Tunisia">Tunisia</option> 
										<option value="Turkey">Turkey</option> 
										<option value="Turkmenistan">Turkmenistan</option> 
										<option value="Turks and Caicos Islands">Turks and Caicos Islands</option> 
										<option value="Tuvalu">Tuvalu</option> 
										<option value="Uganda">Uganda</option> 
										<option value="Ukraine">Ukraine</option> 
										<option value="United Arab Emirates">United Arab Emirates</option> 
										<option value="United Kingdom">United Kingdom</option> 
										<option value="United States">United States</option> 
										<option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option> 
										<option value="Uruguay">Uruguay</option> 
										<option value="Uzbekistan">Uzbekistan</option> 
										<option value="Vanuatu">Vanuatu</option> 
										<option value="Venezuela">Venezuela</option> 
										<option value="Viet Nam">Viet Nam</option> 
										<option value="Virgin Islands, British">Virgin Islands, British</option> 
										<option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option> 
										<option value="Wallis and Futuna">Wallis and Futuna</option> 
										<option value="Western Sahara">Western Sahara</option> 
										<option value="Yemen">Yemen</option> 
										<option value="Zambia">Zambia</option> 
										<option value="Zimbabwe">Zimbabwe</option>
									</datalist>
								</div> 
							</div>
							<div class="col-md-6" > 
								<div class="form-group"> 
									<label for="field-2" class="control-label"><?php echo $lang['langs_029'] ?></label> 
									<input name="c_address" value="" class="form-control" >													
								</div> 
							</div> 							
						</div>
						<div class="row"> 										
							<div class="col-md-4" > 
								<div class="form-group"> 
									<label for="field-2" class="control-label"><?php echo $lang['langs_030'] ?></label> 
									<input name="courier" class="form-control" list="browsecom" autocomplete="off" placeholder="<?php echo $lang['langs_031'] ?>">
									<datalist id="browsecom">
										<?php foreach ($courierrow as $row):?>
											<option value="<?php echo $row->name_com; ?>"><?php echo $row->name_com; ?></option>
										<?php endforeach;?>
									</datalist>
								</div> 
							</div>
							<div class="col-md-4"> 
								<div class="form-group"> 
									<label for="field-3" class="control-label"><?php echo $lang['langs_032'] ?></label> 
									<input class="form-control" name="service_options" list="browsemo" autocomplete="off" placeholder="<?php echo $lang['langs_033'] ?>">
									<datalist id="browsemo">
										<?php foreach ($moderow as $row):?>
											<option value="<?php echo $row->ship_mode; ?>"><?php echo $row->ship_mode; ?></option>
										<?php endforeach;?>
									</datalist>
								</div> 
							</div>
							<div class="col-md-4" > 
								<div class="form-group"> 
									<label for="field-2" class="control-label"><?php echo $lang['langs_034'] ?></label> 
									<input name="deli_time" value="" class="form-control" >													
								</div> 
							</div>
						</div>
						<div class="row">
							<div class="col-md-4"> 
							<label for="field-3" class="control-label"><?php echo $lang['langs_035'] ?></label> 
								<div class="input-group mb-3"> 
									<div class="input-group-prepend">
                                        <span class="input-group-text" style="color:#ff0000"><i class="fas fa-car"></i></span>
                                    </div>
									<input class="form-control" name="c_driver" list="browser" autocomplete="off" placeholder="<?php echo $lang['langs_036'] ?>">
									<datalist id="browser">
										<?php foreach ($driverrow as $row):?>
										<option value="<?php echo $row->username; ?>"><?php echo $row->fname; ?> <?php echo $row->lname; ?></option>
										<?php endforeach;?>
									</datalist>
								</div> 
							</div>
							<div class="col-md-4" > 
								<div class="form-group"> 
									<label for="field-2" class="control-label"><?php echo $lang['langs_037'] ?></label> 
									<input class="form-control" name="code_off" list="browsee" autocomplete="off" placeholder="<?php echo $lang['langs_038'] ?>">
									<datalist id="browsee">
										<?php foreach ($office as $row):?>
											<option value="<?php echo $row->code_off; ?>"><?php echo $row->code_off; ?></option>
										<?php endforeach;?>
									</datalist>													
								</div> 
							</div> 

							<div class="col-md-4"> 
								<div class="form-group"> 
									<label for="field-3" class="control-label"><?php echo $lang['langs_039'] ?></label> 
									<input class="form-control" name="status_courier" list="browse" autocomplete="off" placeholder="<?php echo $lang['langs_040'] ?>">
									<datalist id="browse">
										<?php foreach ($statusrow as $row):?>
											<option value="<?php echo $row->mod_style; ?>"><?php echo $row->mod_style; ?></option>
										<?php endforeach;?>
									</datalist>
								</div> 
							</div> 
						</div> 
						<div class="row"> 										
							<div class="col-md-12"> 
								<div class="form-group"> 
									<label for="field-3" class="control-label"><?php echo $lang['langs_042'] ?></label> 
									<textarea class="form-control" name="comments"  placeholder="<?php echo $lang['langs_041'] ?>" required></textarea> 
								</div> 
							</div> 
						</div>
						<hr />
						<div class="row"> 
							<div class="col-md-3">
								<label for="field-2" class="control-label"><?php echo $lang['add-title23'] ?> </label>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
                                        <span class="input-group-text" style="color:#ff0000"><i class="fas fa-donate"></i></span>
                                    </div>
									<input class="form-control" name="pay_mode" list="browserME" autocomplete="off" placeholder="<?php echo $lang['langs_043'] ?>">
									<datalist id="browserME">
										<?php foreach ($payrow as $row):?>
										<option value="<?php echo $row->met_payment; ?>"><?php echo $row->met_payment; ?></option>
										<?php endforeach;?>
									</datalist>
									
								</div>
							</div>
						
							<div class="col-md-3" > 
								<label for="field-2" class="control-label"><?php echo $lang['langs_044'] ?></label>
								<div class="input-group mb-3"> 
									<div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-sort-numeric-up"></i></span>
                                    </div>	
									<input type="number" name="r_qnty" value="<?php echo $netos; ?>" class="form-control" >													
								</div> 
							</div>
							<div class="col-md-3" > 
							<label for="field-2" class="control-label"><?php echo $lang['langs_045'] ?></label>
								<div class="input-group mb-3"> 
									<div class="input-group-prepend">
                                        <span class="input-group-text"><i class="mdi mdi-weight-kilogram"></i></span>
                                    </div>
									<input type="number" name="r_weight" onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();" id="sum2" value="<?php echo $neto; ?>" class="form-control" aria-describedby="basic-addon1">													
								</div> 
							</div>
							<div class="col-md-3"> 
							<label for="field-2" class="control-label"><?php echo $lang['langs_046'] ?></label>
								<div class="input-group mb-3">  		 
									<div class="input-group-prepend">
                                        <span class="input-group-text"><i class="mdi mdi-weight"></i></span>
                                    </div>
									<input type="number" name="c_add_pound" onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();" id="sum3" value="0" class="form-control" >													
								</div> 
							</div>							
						</div>
						<div class="row"> 
							<div class="col-md-3"> 
								<label for="field-2" class="control-label"><?php echo $lang['langs_047'] ?></label>
								<div class="input-group mb-3"> 
									<div class="input-group-prepend">
                                        <span class="input-group-text" style="color:#ff0000"><?php echo $core->currency;?></span>
                                    </div>
									<input type="number" name="r_declarate" onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();" id="sum4" value="0" class="form-control" >													
								</div> 
							</div>		
							<div class="col-md-3">
								<label for="field-2" class="control-label"><?php echo $lang['langs_048'] ?></label>
								<div class="input-group mb-3">  
									<div class="input-group-prepend">
                                        <span class="input-group-text"><?php echo $core->currency;?></span>
                                    </div>
									<input type="number" name="reexpedition" onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();" id="sum5" value="<?php echo $core->c_reexpedition;?>" class="form-control" >													
								</div> 
							</div>

							<div class="col-md-6">
								<label for="field-2" class="control-label"><?php echo $lang['add-title44'] ?></b></label>
								<div class="input-group mb-3">  
									<div class="input-group-prepend">
										<span class="input-group-text"><?php echo $core->currency;?></span>
									</div>
									<input type="text" class="form-control" name="r_costtotal" id="total_result" value="0" readonly> </p>
								</div>
							</div>
							<!--/span-->
						</div>
					</div> 
					<div class="modal-footer" id="contenido"> 
						<button type="button" class="btn btn-white" data-dismiss="modal"><?php echo $lang['langs_049'] ?></button> 
						<button type="submit" name="dosubmit" class="btn btn-success"> <i class="mdi mdi-gift"></i>&nbsp; <?php echo $lang['langs_050'] ?></button>
					</div>
					<input name="idcon" type="hidden" value="<?php echo $id_con; ?>" />
				</form>	
				</div>				
			</div>
		</div><!-- /.modal -->
		<?php echo Core::doForm("processConsolidate");?>	
		
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


		<script type="text/javascript">

			function suma(){
				
				<!--General sale formula-->
				var num2 = "5.56789";
				var sum2 = document.getElementById("sum2");
				var sum3 = document.getElementById("sum3");
				var sum4 = document.getElementById("sum4");
				var sum5 = document.getElementById("sum5");
				
				
				<!--Formula Values-->
				
				var value_pound = <?php echo $core->c_value_pound;?>;
				var add_pound = <?php echo $core->c_add_pound;?>;
				var handling = <?php echo $core->c_handling;?>;
				var fuel = <?php echo $core->c_fuel;?>;
				var reexpedition = <?php echo $core->c_reexpedition;?>;
				var logistic = <?php echo $core->c_logistic;?>;
				var surcharges = <?php echo $core->c_surcharges;?>;
				var safe = <?php echo $core->c_safe;?>;
				var nationalization = <?php echo $core->c_nationalization;?>;
				var tariffs = <?php echo $core->c_tariffs;?>;
				var vat = <?php echo $core->c_vat;?>;
				var input = document.getElementById("total_result");
				
				var percent = 100;
				
				var total_pound = sum2.value * value_pound; 									<!--Tax on the value of the article-->
				var total_add_pound = sum3.value * add_pound;
				var total_fuel = fuel;												<!--Shipping weight value-->
				var total_handling = handling;
				var total_reexpedition = sum5.value;
				var total_logistic = logistic * <?php echo $net; ?>;
				var total_safe =  sum4.value * safe/percent;
				var total_nationalization = nationalization * <?php echo $netos; ?>;
				
				var total_tax = vat/percent; 	<!--Total sales tax-->

				
				
				taxes = parseFloat(parseFloat(total_pound) +  parseFloat(total_add_pound) +  parseFloat(total_fuel) +  parseFloat(total_handling) +  parseFloat(total_reexpedition) +  parseFloat(total_safe) +  parseFloat(total_logistic) +  parseFloat(total_nationalization) ) * parseFloat(vat/percent) .toFixed(2);
				surcharge = parseFloat(parseFloat(total_pound) +  parseFloat(total_add_pound) +  parseFloat(total_fuel) +  parseFloat(total_handling) +  parseFloat(total_reexpedition) +  parseFloat(total_safe) +  parseFloat(total_logistic) +  parseFloat(total_nationalization) ) * parseFloat(surcharges/percent) .toFixed(2); <!--Total result formula-->
				
				total_result = parseFloat(parseFloat(total_pound) +  parseFloat(total_add_pound) +  parseFloat(total_fuel) +  parseFloat(total_handling) +  parseFloat(total_reexpedition) +  parseFloat(total_safe) +  parseFloat(total_logistic) +  parseFloat(total_nationalization)  + parseFloat(taxes) + parseFloat(surcharge)) .toFixed(2); <!--Total result formula-->
				
				input.value= total_result;

			}
			

		</script>
		

		
</body>

</html>