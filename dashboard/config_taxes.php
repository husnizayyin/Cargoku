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

  if (!defined("_VALID_PHP"))
      die('Direct access to this location is not allowed.');
?>


<?php include 'head_user.php'; ?>

<div class="row justify-content-center">
	<div class="col-lg-10">
		<div class="row">
			<!-- Column -->
			<div class="col-12">
				<div class="card">
					<div class="card-body">
					<header><b><?php echo $lang['tools-config57'] ?></b></header>
						<form class="xform" id="admin_form" method="post">
							<hr />
							<header><b><?php echo $lang['tools-config35'] ?></b></header>
							<div class="row">
								<section class="col col-6">
									<label class="input"><i class="icon-append icon-exclamation-sign  tooltip" data-title="<?php echo $lang['tools-config37'] ?>"></i>
										<input type="text" name="prefix" value="<?php echo $core->prefix;?>" placeholder="<?php echo $lang['tools-config40'] ?>">
									</label>
									<div class="note"><?php echo $lang['tools-config36'] ?></div>
								</section>
								<section class="col col-6">
									<label class="input"><i class="icon-append icon-exclamation-sign  tooltip" data-title="<?php echo $lang['tools-config49'] ?>"></i>
										<input type="text" name="track_digit" value="<?php echo $core->track_digit;?>" placeholder="<?php echo $lang['tools-config39'] ?>">
									</label>
									<div class="note-error"><i class="mdi mdi-cube-send"></i> <?php echo $lang['tools-config38'] ?></div>
								</section>
								</br></br>
								<section class="col col-6">
									<label class="input"><i class="icon-append icon-exclamation-sign  tooltip" data-title="<?php echo $lang['tools-config37'] ?>"></i>
										<input type="text" name="prefix_con" value="<?php echo $core->prefix_con;?>" placeholder="<?php echo $lang['tools-config40'] ?>">
									</label>
									<div class="note"><?php echo $lang['tools-config36'] ?></div>
								</section>
								<section class="col col-6">
									<label class="input"><i class="icon-append icon-exclamation-sign  tooltip" data-title="<?php echo $lang['tools-config49'] ?>"></i>
										<input type="text" name="track_container" value="<?php echo $core->track_container;?>" placeholder="<?php echo $lang['tools-config39'] ?>">
									</label>
									<div class="note-error"><i class="mdi mdi-view-week"></i> <?php echo $lang['tools-config41'] ?></div>
								</section>
								</br></br>
								<section class="col col-6">
									<label class="input"><i class="icon-append icon-exclamation-sign  tooltip" data-title="<?php echo $lang['tools-config67'] ?>"></i>
										<input type="text" name="prefix_consolidate" value="<?php echo $core->prefix_consolidate;?>" placeholder="<?php echo $lang['tools-config68'] ?>">
									</label>
									<div class="note"><?php echo $lang['tools-config71'] ?></div>
								</section>
								<section class="col col-6">
									<label class="input"><i class="icon-append icon-exclamation-sign  tooltip" data-title="<?php echo $lang['tools-config69'] ?>"></i>
										<input type="text" name="track_consolidate" value="<?php echo $core->track_consolidate;?>" placeholder="<?php echo $lang['tools-config70'] ?>">
									</label>
									<div class="note-error"><i class="mdi mdi-gift" style="color:#7460ee"></i> <?php echo $lang['tools-config72'] ?></div>
								</section>
								</br></br>
								<section class="col col-12">
								<label class="input">	
									<input type="text" name="interms" value="<?php echo $core->interms;?>">
								</label>	
									<div class="note"><?php echo $lang['tools-config42'] ?></div>
								</section>
								
								<section class="col col-6">
									<label class="input"><i class="icon-append icon-exclamation-sign  tooltip" data-title=""></i>
										<input type="text" name="signing_company" value="<?php echo $core->signing_company;?>" placeholder="<?php echo $lang['tools-config43'] ?>">
									</label>
									<div class="note"> <?php echo $lang['tools-config43'] ?></div>
								</section>
								<section class="col col-6">
									<label class="input"><i class="icon-append icon-exclamation-sign  tooltip" data-title=""></i>
										<input type="text" name="signing_customer" value="<?php echo $core->signing_customer;?>" placeholder="<?php echo $lang['tools-config44'] ?>">
									</label>
									<div class="note"><?php echo $lang['tools-config44'] ?></div>
								</section>
							</div>
							<hr />
							<header><b><?php echo $lang['tools-config45'] ?></b></header>
							<div class="row">
								<section class="col col-4">
									<label class="input"><i class="icon-append icon-exclamation-sign  tooltip" data-title=""></i>
										<input type="text" name="tax" value="<?php echo $core->tax;?>" placeholder="<?php echo $lang['tools-config46'] ?>">
									</label>
									<div class="note"><i class="fas fa-percent" style="color:#ff0000"></i> <?php echo $lang['tools-config46'] ?></div>
								</section>
								<section class="col col-4">
									<label class="input"><i class="icon-append icon-exclamation-sign  tooltip" data-title=""></i>
										<input type="text" name="insurance" value="<?php echo $core->insurance;?>" placeholder="<?php echo $lang['tools-config48'] ?>">
									</label>
									<div class="note"><i class="fas fa-percent" style="color:#ff0000"></i> <?php echo $lang['tools-config47'] ?></div>
								</section>
								<section class="col col-4">
									<label class="input"><i class="icon-append icon-exclamation-sign  tooltip" data-title=""></i>
										<input type="text" name="value_weight" value="<?php echo $core->value_weight;?>" placeholder="<?php echo $lang['tools-config58'] ?>">
									</label>
									<div class="note"><b style="color:#ff0000"><?php echo $core->currency;?></b> <?php echo $lang['tools-config58'] ?></div>
								</section>
							</div>	
							<div class="row">	
								<section class="col col-4">
									<label class="input"><i class="icon-append icon-exclamation-sign  tooltip" data-title="Limit digits in tracking 15"></i>
										<input type="text" name="meter" value="<?php echo $core->meter;?>" placeholder="Volumetric">
									</label>
									<div class="note"><i class="ti-package" style="color:#ff0000"></i> <?php echo $lang['tools-config50'] ?> <b>L x W x H / <?php echo $core->meter;?></b></div>
								</section>
								
								<section class="col col-4">										
									<select class="custom-select col-12" name="currency" placeholder="Currency">
										<option value="" disabled=""><?php echo $lang['tools-config51'] ?></option>
										<option label="AED" value="AED"<?php if ($core->currency == "AED") echo " selected=\"selected\"";?>>AED</option>
										<option label="ARS" value="ARS"<?php if ($core->currency == "ARS") echo " selected=\"selected\"";?>>ARS</option>
										<option label="AUD" value="AUD"<?php if ($core->currency == "AUD") echo " selected=\"selected\"";?>>AUD</option>
										<option label="BGN" value="BGN"<?php if ($core->currency == "BGN") echo " selected=\"selected\"";?>>BGN</option>
										<option label="BND" value="BND"<?php if ($core->currency == "BND") echo " selected=\"selected\"";?>>BND</option>
										<option label="BOB" value="BOB"<?php if ($core->currency == "BOB") echo " selected=\"selected\"";?>>BOB</option>
										<option label="BRL" value="BRL"<?php if ($core->currency == "BRL") echo " selected=\"selected\"";?>>BRL</option>
										<option label="CAD" value="CAD"<?php if ($core->currency == "CAD") echo " selected=\"selected\"";?>>CAD</option>
										<option label="CHF" value="CHF"<?php if ($core->currency == "CHF") echo " selected=\"selected\"";?>>CHF</option>
										<option label="CLP" value="CLP"<?php if ($core->currency == "CLP") echo " selected=\"selected\"";?>>CLP</option>
										<option label="CNY" value="CNY"<?php if ($core->currency == "CNY") echo " selected=\"selected\"";?>>CNY</option>
										<option label="COP" value="COP"<?php if ($core->currency == "COP") echo " selected=\"selected\"";?>>COP</option>
										<option label="CZK" value="CZK"<?php if ($core->currency == "CZK") echo " selected=\"selected\"";?>>CZK</option>
										<option label="DKK" value="DKK"<?php if ($core->currency == "DKK") echo " selected=\"selected\"";?>>DKK</option>
										<option label="EGP" value="EGP"<?php if ($core->currency == "EGP") echo " selected=\"selected\"";?>>EGP</option>
										<option label="EUR" value="EUR"<?php if ($core->currency == "EUR") echo " selected=\"selected\"";?>>EUR</option>
										<option label="FJD" value="FJD"<?php if ($core->currency == "FJD") echo " selected=\"selected\"";?>>FJD</option>
										<option label="GBP" value="GBP"<?php if ($core->currency == "GBP") echo " selected=\"selected\"";?>>GBP</option>
										<option label="HKD" value="HKD"<?php if ($core->currency == "HKD") echo " selected=\"selected\"";?>>HKD</option>
										<option label="HRK" value="HRK"<?php if ($core->currency == "HRK") echo " selected=\"selected\"";?>>HRK</option>
										<option label="HUF" value="HUF"<?php if ($core->currency == "HUF") echo " selected=\"selected\"";?>>HUF</option>
										<option label="IDR" value="IDR"<?php if ($core->currency == "IDR") echo " selected=\"selected\"";?>>IDR</option>
										<option label="ILS" value="ILS"<?php if ($core->currency == "ILS") echo " selected=\"selected\"";?>>ILS</option>
										<option label="INR" value="INR"<?php if ($core->currency == "INR") echo " selected=\"selected\"";?>>INR</option>
										<option label="JPY" value="JPY"<?php if ($core->currency == "JPY") echo " selected=\"selected\"";?>>JPY</option>
										<option label="KES" value="KES"<?php if ($core->currency == "KES") echo " selected=\"selected\"";?>>KES</option>
										<option label="KRW" value="KRW"<?php if ($core->currency == "KRW") echo " selected=\"selected\"";?>>KRW</option>
										<option label="LTL" value="LTL"<?php if ($core->currency == "LTL") echo " selected=\"selected\"";?>>LTL</option>
										<option label="MAD" value="MAD"<?php if ($core->currency == "MAD") echo " selected=\"selected\"";?>>MAD</option>
										<option label="MXN" value="MXN"<?php if ($core->currency == "MXN") echo " selected=\"selected\"";?>>MXN</option>
										<option label="MYR" value="MYR"<?php if ($core->currency == "MYR") echo " selected=\"selected\"";?>>MYR</option>
										<option label="NGN" value="NGN"<?php if ($core->currency == "NGN") echo " selected=\"selected\"";?>>NGN</option>
										<option label="NOK" value="NOK"<?php if ($core->currency == "NOK") echo " selected=\"selected\"";?>>NOK</option>
										<option label="NZD" value="NZD"<?php if ($core->currency == "NZD") echo " selected=\"selected\"";?>>NZD</option>
										<option label="PEN" value="PEN"<?php if ($core->currency == "PEN") echo " selected=\"selected\"";?>>PEN</option>
										<option label="PHP" value="PHP"<?php if ($core->currency == "PHP") echo " selected=\"selected\"";?>>PHP</option>
										<option label="PKR" value="PKR"<?php if ($core->currency == "PKR") echo " selected=\"selected\"";?>>PKR</option>
										<option label="PLN" value="PLN"<?php if ($core->currency == "PLN") echo " selected=\"selected\"";?>>PLN</option>
										<option label="RON" value="RON"<?php if ($core->currency == "RON") echo " selected=\"selected\"";?>>RON</option>
										<option label="RSD" value="RSD"<?php if ($core->currency == "RSD") echo " selected=\"selected\"";?>>RSD</option>
										<option label="RUB" value="RUB"<?php if ($core->currency == "RUB") echo " selected=\"selected\"";?>>RUB</option>
										<option label="SAR" value="SAR"<?php if ($core->currency == "SAR") echo " selected=\"selected\"";?>>SAR</option>
										<option label="SEK" value="SEK"<?php if ($core->currency == "SEK") echo " selected=\"selected\"";?>>SEK</option>
										<option label="SGD" value="SGD"<?php if ($core->currency == "SGD") echo " selected=\"selected\"";?>>SGD</option>
										<option label="THB" value="THB"<?php if ($core->currency == "THB") echo " selected=\"selected\"";?>>THB</option>
										<option label="TRY" value="TRY"<?php if ($core->currency == "TRY") echo " selected=\"selected\"";?>>TRY</option>
										<option label="TWD" value="TWD"<?php if ($core->currency == "TWD") echo " selected=\"selected\"";?>>TWD</option>
										<option label="UAH" value="UAH"<?php if ($core->currency == "UAH") echo " selected=\"selected\"";?>>UAH</option>
										<option label="USD" value="USD"<?php if ($core->currency == "USD") echo " selected=\"selected\"";?>>Dollar</option>
										<option label="VEF" value="VEF"<?php if ($core->currency == "VEF") echo " selected=\"selected\"";?>>VEF</option>
										<option label="VND" value="VND"<?php if ($core->currency == "VND") echo " selected=\"selected\"";?>>VND</option>
										<option label="ZAR" value="ZAR"<?php if ($core->currency == "ZAR") echo " selected=\"selected\"";?>>ZAR</option>
										<option label="TJS" value="TJS"<?php if ($core->currency == "TJS") echo " selected=\"selected\"";?>>Somoni tayiko</option>
									</select>
									<div class="note"> <?php echo $lang['tools-config52'] ?></b></div>
								</section>
							</div>
							</br></br>
							<h4 class="card-title"><b><?php echo $lang['langs_070'] ?></b></h4>
							<hr />
							<div class="row">
								<section class="col col-4">
									<label class="input">
										<input type="text" name="c_value_pound" value="<?php echo $core->c_value_pound;?>" placeholder="<?php echo $lang['langs_071'] ?>">
									</label>
									<div class="note"><b style="color:#ff0000"><?php echo $core->currency;?></b> <?php echo $lang['langs_072'] ?></div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="c_add_pound" value="<?php echo $core->c_add_pound;?>" placeholder="<?php echo $lang['langs_073'] ?>">
									</label>
									<div class="note"><i class="mdi mdi-weight" style="color:#ff0000"></i> <?php echo $lang['langs_073'] ?></div>
								</section>
								
								<section class="col col-4">
									<label class="input">
										<input type="text" name="c_handling" value="<?php echo $core->c_handling;?>" placeholder="<?php echo $lang['langs_074'] ?>">
									</label>
									<div class="note"><b style="color:#ff0000"><?php echo $core->currency;?></b> <?php echo $lang['langs_074'] ?></div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="c_fuel" value="<?php echo $core->c_fuel;?>" placeholder="75">
									</label>
									<div class="note"><b style="color:#ff0000"><?php echo $core->currency;?></b> <?php echo $lang['langs_075'] ?></div>
								</section>
								
								<section class="col col-4">
									<label class="input">
										<input type="text" name="c_reexpedition" value="<?php echo $core->c_reexpedition;?>" placeholder="<?php echo $lang['langs_076'] ?>">
									</label>
									<div class="note"><b style="color:#ff0000"><?php echo $core->currency;?></b> <?php echo $lang['langs_076'] ?></div>
								</section>
								
								<section class="col col-4">
									<label class="input">
										<input type="text" name="c_logistic" value="<?php echo $core->c_logistic;?>" placeholder="<?php echo $lang['langs_077'] ?>">
									</label>
									<div class="note"><b style="color:#ff0000"><?php echo $core->currency;?></b> <?php echo $lang['langs_077'] ?></div>
								</section>
								
								<section class="col col-4">
									<label class="input">
										<input type="text" name="c_surcharges" value="<?php echo $core->c_surcharges;?>" placeholder="<?php echo $lang['langs_078'] ?>">
									</label>
									<div class="note"><i class="fas fa-percent" style="color:#ff0000"></i> <?php echo $lang['langs_078'] ?></div>
								</section>
								
								<section class="col col-4">
									<label class="input">
										<input type="text" name="c_safe" value="<?php echo $core->c_safe;?>" placeholder="<?php echo $lang['langs_079'] ?>">
									</label>
									<div class="note"><i class="fas fa-percent" style="color:#ff0000"></i> <?php echo $lang['langs_079'] ?></div>
								</section>
								
								<section class="col col-4">
									<label class="input">
										<input type="text" name="c_nationalization" value="<?php echo $core->c_nationalization;?>" placeholder="<?php echo $lang['langs_080'] ?>">
									</label>
									<div class="note"><b style="color:#ff0000"><?php echo $core->currency;?></b> <?php echo $lang['langs_080'] ?></div>
								</section>
								
								<section class="col col-4">
									<label class="input">
										<input type="text" name="c_tariffs" value="<?php echo $core->c_tariffs;?>" placeholder="<?php echo $lang['langs_081'] ?>">
									</label>
									<div class="note"><i class="fas fa-percent" style="color:#ff0000"></i> <?php echo $lang['langs_081'] ?></div>
								</section>
								
								<section class="col col-4">
									<label class="input">
										<input type="text" name="c_vat" value="<?php echo $core->c_vat;?>" placeholder="<?php echo $lang['langs_082'] ?>">
									</label>
									<div class="note"><i class="fas fa-percent" style="color:#ff0000"></i> <?php echo $lang['langs_082'] ?></div>
								</section>
							</div>
							<footer>
								<button type="submit" class="button" name="dosubmit"><?php echo $lang['tools-config56'] ?><span><i class="icon-ok"></i></span></button>
							</footer>
						</form>
					</div>
				</div>
			</div>
			<!-- Column -->
		</div>
	</div>
</div>							
<?php echo Core::doForm("processConfig_taxes");?> 
