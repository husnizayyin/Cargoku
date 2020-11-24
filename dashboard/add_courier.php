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
	
    <title><?php echo $lang['add-courier'] ?> | <?php echo $core->site_name ?></title>
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
		<?php $courierrow = $core->getCouriercom(); ?>
		<?php $statusrow = $core->getStatus(); ?>
		<?php $packrow = $core->getPack(); ?>
		<?php $payrow = $core->getPayment(); ?>
		<?php $itemrow = $core->getItem(); ?>
		<?php $moderow = $core->getShipmode();?>
		<?php $driverrow = $user->getDrivers();?>

        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 align-self-center">
                        <h4 class="page-title"><?php include("filter.php");?></h4>
						<?php echo $lang['add-title1'] ?> <b><?php echo $row->country;?>, <?php echo $row->city;?> - <?php echo $row->postal;?></b></br>
						<?php echo $lang['add-title2'] ?> <b><?php echo $row->fname;?> <?php echo $row->lname;?></b>
                    </div>
                </div>
				<?php include 'head_courier.php'; ?>
            </div>

            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- row -->
				<form id="admin_form" method="post">
                <div class="row">
					<div class="col-sm-12 col-lg-6" style="display:none">
						<div class="card">
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
											<input type="text" class="form-control is-valid" name="s_name" value="<?php echo $row->fname;?> <?php echo $row->lname;?>" placeholder="First Name Here">
										</div>
									</div>
								</div>
								<div class="row">
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
											<input type="text" class="form-control is-valid" name="city" value="<?php echo $row->city;?>" placeholder="City">
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
							<h4 class="card-title"><?php echo $lang['add-title3'] ?></h4>
								<div class="row">
									<div class="col-sm-12 col-md-6">
										<label for="inputname" class="control-label col-form-label"><?php echo $lang['add-title4'] ?></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1"><i class="far fa-user"></i></span>
											</div>
											<input type="text" class="form-control" name="r_name">
										</div>
									</div>
									<div class="col-sm-12 col-md-6">
										<div class="form-group">
											<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['add-title5'] ?></label>
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1">@</span>
												</div>
												<input type="email" class="form-control" name="r_email">
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12 col-md-4">
										<label for="inputlname" class="control-label col-form-label"><?php echo $lang['add-title6'] ?></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1"><i class="icon-direction"></i></span>
											</div>
											<input type="text" class="form-control" name="r_address" placeholder="<?php echo $lang['add-title7'] ?>">
										</div>
									</div>
									<div class="col-sm-12 col-md-4">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['add-title8'] ?></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1"><i class="icon-phone"></i></span>
											</div>
											<input type="number" class="form-control" name="r_phone"  placeholder="78524541">
										</div>
									</div>
									<div class="col-sm-12 col-md-4">
										<label for="inputcontact" class="control-label col-form-label" style="color:#ff0000"><b><?php echo $lang['add-title9'] ?></b></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1"><i class="icon-screen-smartphone"></i></span>
											</div>
											<input type="number" class="form-control" name="rc_phone" placeholder="(+1)3244152">
										</div>
									</div>									                                     
								</div>
								<div class="row"> 
									<div class="col-sm-12 col-md-4">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['add-title10'] ?></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1"><i class="icon-location-pin"></i></span>
											</div>
											<input type="text" class="form-control" name="r_dest" placeholder="Select Country" list="browsers5" autocomplete="off" required="required">
											<datalist id="browsers5">
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
									<div class="col-sm-12 col-md-4">
										<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['add-title11'] ?></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1"><i class="icon-map"></i></span>
											</div>
											<input type="text" class="form-control" name="r_city">
										</div>
									</div>
								
									<div class="col-sm-12 col-md-4">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['add-title12'] ?></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1"><i class="icon-pin"></i></span>
											</div>
											<input type="text" class="form-control" name="r_postal">
										</div>
									</div>
								</div>
								
								<div class="row"> </br></div>
								<hr class="m-t-0 m-b-35">
								
								<h4 class="card-title"><?php echo $lang['add-title13'] ?></h4>
								<div class="row">									
									<div class="col-sm-12 col-md-6" style="display:none">
										<div class="form-group">
											<label for="inputname" class="control-label col-form-label">Staff Role*</label>
											<input type="text" class="form-control" name="level" value="<?php echo $user->username; ?>" placeholder="Staff Role" disabled>
										</div>
									</div>										
									<div class="col-sm-12 col-md-3">
										<label for="inputname" class="control-label col-form-label"><?php echo $lang['add-title14'] ?></label>
										<div class="input-group mb-3">
											<select class="form-control" id="exampleFormControlSelect1" name="origin_off" >
											<?php foreach ($office as $row):?>
												<option value="<?php echo $row->name_off; ?>"><?php echo $row->name_off; ?></option>
											<?php endforeach;?>
											</select>
										</div>
									</div>
									<div class="col-sm-12 col-md-4">
										<label for="inputname" class="control-label col-form-label"><?php echo $lang['langs_035'] ?></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" style="color:#ff0000"><i class="fas fa-car"></i></span>
											</div>
											<input class="form-control" id="exampleFormControlSelect1" name="c_driver" list="browser" autocomplete="off" placeholder="Select Driver">
												<datalist id="browser">
													<?php foreach ($driverrow as $row):?>
													<option value="<?php echo $row->username; ?>"><?php echo $row->fname; ?> <?php echo $row->lname; ?></option>
													<?php endforeach;?>
												</datalist>
										</div>
									</div>
									<div class="col-sm-12 col-md-5">
										<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['add-title15'] ?></i></label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">
													<span style="color:#ff0000" class="ti-calendar"></span>
												</span>
											</div>
											<input type='text' class="form-control" id='datetimepicker1' name="collection_courier" placeholder="Default Pickadate" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['add-title16'] ?>" />
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12 col-md-4">
										<label for="inputlname" class="control-label col-form-label"><?php echo $lang['add-title17'] ?> <i style="color:#ff0000" class="fas fa-boxes"></i></label>
										<div class="input-group">
											<input class="form-control" name="package" placeholder="Select Package" list="browsers1" autocomplete="off" required="required">
											<datalist id="browsers1">
												<?php foreach ($packrow as $row):?>
												<option value="<?php echo $row->name_pack; ?>"><?php echo $row->name_pack; ?></option>
												<?php endforeach;?>
											</datalist>	
										</div>
									</div>
									<div class="col-sm-12 col-md-4">
										<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['add-title18'] ?></label>
										<div class="input-group">
											<input class="form-control" name="courier" placeholder="Select Company Courier" list="browsers2" autocomplete="off" required="required">
											<datalist id="browsers2">
												<?php foreach ($courierrow as $row):?>
												<option value="<?php echo $row->name_com; ?>"><?php echo $row->name_com; ?></option>
												<?php endforeach;?>
											</datalist>
										</div>
									</div>										
									<div class="col-sm-12 col-md-4">
										<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['add-title19'] ?> <i style="color:#ff0000" class="fas fa-shipping-fast"></i></label>
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
									<div class="col-sm-12 col-md-4">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['add-title20'] ?></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1"><i class="icon-clock"></i></span>
											</div>
											<input type="text" class="form-control" name="deli_time" Value="<?php echo $lang['add-title21'] ?>">
										</div>
									</div>

									<div class="col-sm-12 col-md-4">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['add-title22'] ?></label>
										<div class="input-group mb-3">
											<input class="form-control" name="service_options" placeholder="Select Shipping Mode" list="browsers3" autocomplete="off" required="required">
											<datalist id="browsers3">
												<?php foreach ($moderow as $row):?>
												<option value="<?php echo $row->ship_mode; ?>"><?php echo $row->ship_mode; ?></option>
												<?php endforeach;?>
											</datalist>	
										</div>
									</div>
									
									<div class="col-sm-12 col-md-4">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['add-title23'] ?> <i style="color:#ff0000" class="fas fa-donate"></i></label>
										<div class="input-group mb-3">
											<select class="custom-select col-12" name="pay_mode">
												<?php foreach ($payrow as $row):?>
												<option value="<?php echo $row->met_payment; ?>"><?php echo $row->met_payment; ?></option>
												<?php endforeach;?>
											</select>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php $track = $courier->order_track();?>
					<?php $prefix = $courier->order_prefix();?>
					<div class="col-sm-12 col-lg-6">
						<div class="card">
							<div class="card-body">
							<h4 class="card-title"><?php echo $lang['add-title48'] ?></h4>
							
								<div class="row">
									<div class="col-sm-12 col-md-6">										
										<label for="inputcom" class="control-label col-form-label"><?php echo $lang['add-title24'] ?></label>
										<div class="input-group mb-4">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1" style="color:#ff0000"><?php echo $prefix;?></span>
											</div>	
											<input type="text" class="form-control" name="tracking" value="<?php echo $track;?>">
										</div>
									</div>

									<div class="col-sm-12 col-md-3">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['add-title25'] ?></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1"><i class="fas fa-percent" style="color:#36bea6"></i></span>
											</div>
											<input type="number" class="form-control" onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();"  id="sum3" name="r_tax" value="<?php echo $core->tax;?>">
										</div>
									</div>
									<div class="col-sm-12 col-md-3">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['add-title26'] ?></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1"><i class="fas fa-percent" style="color:#36bea6"></i></span>
											</div>
											<input type="number" class="form-control"  onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();" id="sum5" name="r_insurance" value="<?php echo $core->insurance;?>">											
										</div>
									</div>
								</div>
								<div class="row"></br></div>
								<div class="card-body bg-light">
									<div class="row"> 
										<div class="col-sm-12 col-md-6">
											<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['add-title27'] ?></label>
											<div class="input-group">
												<input class="form-control" name="itemcat" placeholder="Select Item Category" list="browsers4" autocomplete="off" required="required">
												<datalist id="browsers4">
													<?php foreach ($itemrow as $row):?>
													<option value="<?php echo $row->name_item; ?>"><?php echo $row->name_item; ?></option>
													<?php endforeach;?>
												</datalist>
											</div>
										</div> 
										<div class="col-sm-12 col-md-3">
											<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['add-title28'] ?></label>
											<div class="input-group">
												<input type="number" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['add-title30'] ?>" class="form-control" name="r_qnty">
											</div>
										</div>
										<div class="col-sm-12 col-md-3">
											<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['add-title29'] ?></label>
											<div class="input-group">
												<input type="number" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['add-title31'] ?>" class="form-control" onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();"  id="sum4" name="r_weight">
											</div>
										</div>
										<div class="col-sm-12 col-md-12">
											<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['add-title32'] ?></label>
											<div class="input-group">
												 <textarea class="form-control" rows="2" name="r_description" placeholder="<?php echo $lang['add-title33'] ?>"></textarea>
											</div>
										</div>
									</div>
									<div class="row"> </br></br></div>
									<div class="row">
										<div class="col-sm-12 col-md-8">
											<label for="inputlname" class="control-label col-form-label"><?php echo $lang['add-title34'] ?> <i class="ti-package" style="color:#36bea6"></i> <?php echo $lang['add-title35'] ?> <b><i style="color:#FF0000" class="ti-help-alt" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['add-title36'] ?> / <?php echo $core->meter;?> = kg"></i></b></label>
											<div class="input-group">
												<!-- input box for Length -->
												<input type="number" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['add-title37'] ?>" class="form-control" onblur="if(this.value == ''){this.value='0'}"  onKeyUp="suma();" id="l1" value="0" name="length">
												<div class="cross strong text__color-gray-darker text__size-smaller">&nbsp; x &nbsp;</div>
												<!-- input box for width -->
												<input type="number" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['add-title38'] ?>" class="form-control" onblur="if(this.value == ''){this.value='0'}"  onKeyUp="suma();" id="w2" value="0" name="width">
												<div class="cross strong text__color-gray-darker text__size-smaller">&nbsp; x &nbsp;</div>
												<!-- input box for height -->
												<input type="number" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['add-title39'] ?>" class="form-control" onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();" id="h3" value="0" name="height">
												<input type="number" class="form-control" id="vol" value="0" name="v_weight" style="display:none">
											</div>
										</div>
										<div class="col-sm-12 col-md-4">
											<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['add-title40'] ?> <b><i style="color:#FF0000" class="ti-help-alt" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['add-title41'] ?> <?php echo $core->insurance;?> <?php echo $lang['add-title42'] ?>"></i></b></label>
											<div class="input-group">
												<input type="number" class="form-control" onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();" id="sum2" name="r_custom"  placeholder="0">
											</div>
										</div>
										<div class="col-sm-12 col-md-6" style="display:none">
											<label for="inputname" class="control-label col-form-label"><?php echo $lang['add-title43'] ?></label>
											<input class="form-control" name="r_curren" value="<?php echo $core->currency; ?>" >
										</div>
									</div>									
								</div>
								<hr class="m-t-0 m-b-5">
								<div class="card-body">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group row">
												<label class="control-label text-left col-md-5"><?php echo $lang['add-title44'] ?> &nbsp; <b><?php echo $core->currency;?></b></label>
												<div class="col-md-6">
													<p class="form-control-static"> <input type="text" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['add-title45'] ?>" class="form-control" name="r_costtotal" id="total_result" value="0" readonly> </p>
												</div>
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
													<div class="col-md-offset-3 col-md-9">
														<button type="submit" name="dosubmit" class="btn btn-success"> <i class="icon-plane"></i>&nbsp; <?php echo $lang['add-title46'] ?></button>
														<a href="customer_list.php" class="btn btn-dark"><i class="icon-action-undo"></i> <i class="icon-people"></i> <?php echo $lang['add-title47'] ?></a> 
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
				</form>
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