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

<?php $zonerow = $core->getZone(); ?>
<div class="row justify-content-center">
	<div class="col-lg-10">
		<div class="row">
			<!-- Column -->
			<div class="col-12">
				<div class="card">
					<div class="card-body">				
						<form class="xform" id="admin_form" method="post">
						<header><b><?php echo $lang['tools-config57'] ?></b></header>
							<div class="row">
								<section class="col col-4">
									<label class="input"> <i class="icon-prepend icon-asterisk"></i> <i class="icon-append icon-exclamation-sign  tooltip" data-title="<?php echo $lang['tools-config2'] ?>"></i>
										<input type="text" name="site_name" value="<?php echo $core->site_name;?>" placeholder="<?php echo $lang['tools-config1'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-config1'] ?></div>
								</section>
								<section class="col col-4">
									<label class="input"><i class="icon-prepend icon-asterisk"></i> <i class="icon-append icon-exclamation-sign  tooltip" data-title="<?php echo $lang['tools-config4'] ?>"></i>
										<input type="text" name="site_url" value="<?php echo $core->site_url;?>" placeholder="<?php echo $lang['tools-config3'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-config3'] ?></div>
								</section>
								<section class="col col-4">
									<label class="input"><i class="icon-prepend icon-asterisk"></i> <i class="icon-append icon-exclamation-sign  tooltip" data-title="<?php echo $lang['tools-config6'] ?>"></i>
										<input type="text" name="site_email" value="<?php echo $core->site_email;?>" placeholder="Website Email">
									</label>
									<div class="note note-error"><?php echo $lang['tools-config5'] ?></div>
								</section>
							</div>
							<div class="row">
								<section class="col col-4">
									<label class="input">
										<input type="text" name="c_nit" value="<?php echo $core->c_nit;?>" placeholder="<?php echo $lang['tools-config7'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-config7'] ?></div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="c_phone" value="<?php echo $core->c_phone;?>" placeholder="<?php echo $lang['tools-config8'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-config8'] ?></div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="cell_phone" value="<?php echo $core->cell_phone;?>" placeholder="<?php echo $lang['tools-config9'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-config9'] ?></div>
								</section>
							</div>
							<div class="row">
								<section class="col col-4">
									<label class="input">
										<input type="text" name="c_address" value="<?php echo $core->c_address;?>" placeholder="<?php echo $lang['tools-config10'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-config10'] ?></div>
								</section>
							</div>
							
							<div class="row">
								<section class="col col-4">
									<label class="input">
										<input type="text" name="c_country" value="<?php echo $core->c_country;?>" placeholder="<?php echo $lang['tools-config11'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-config11'] ?></div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="c_city" value="<?php echo $core->c_city;?>" placeholder="<?php echo $lang['tools-config12'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-config12'] ?></div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="c_postal" value="<?php echo $core->c_postal;?>" placeholder="<?php echo $lang['tools-config13'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-config13'] ?></div>
								</section>
							</div>
							
							<div class="row" style="display:none">
								<section class="col col-4">
									<label class="input"> <i class="icon-prepend icon-asterisk"></i> <i class="icon-append icon-exclamation-sign  tooltip" data-title="Default number of items used for pagination"></i>
										<input type="text" name="user_perpage" value="<?php echo $core->user_perpage;?>" placeholder="Items Per Page">
									</label>
									<div class="note note-error">Items Per Page</div>
								</section>
								<section class="col col-4">
									<label class="input"><i class="icon-prepend icon-asterisk"></i> <i class="icon-append icon-exclamation-sign  tooltip" data-title="Default thumbnail width, in px used for resizing avatars"></i>
										<input type="text" name="thumb_w" value="<?php echo $core->thumb_w;?>" placeholder="Thumbnail Width">
									</label>
									<div class="note note-error">Thumbnail Width</div>
								</section>
								<section class="col col-4">
									<label class="input"><i class="icon-prepend icon-asterisk"></i> <i class="icon-append icon-exclamation-sign  tooltip" data-title="Default thumbnail height, in px used for resizing avatars"></i>
										<input type="text" name="thumb_h" value="<?php echo $core->thumb_h;?>" placeholder="Thumbnail Height">
									</label>
									<div class="note note-error">Thumbnail Height</div>
								</section>
							</div>
							<hr />
							<header><b>Authorization of records</b></header>
							<div class="row">
								<section class="col col-3">
									<div class="inline-group">
										<label class="radio">
											<input type="radio" name="reg_verify" value="1" <?php getChecked($core->reg_verify, 1); ?>>
											<i></i><?php echo $lang['tools-config14'] ?></label>
										<label class="radio">
										<input type="radio" name="reg_verify" value="0" <?php getChecked($core->reg_verify, 0); ?>>
										<i></i><?php echo $lang['tools-config15'] ?></label>
									</div>
									<div class="note"><?php echo $lang['tools-config16'] ?> <i class="icon-exclamation-sign  tooltip" data-title="<?php echo $lang['tools-config17'] ?>"></i> </div>
								</section>
								<section class="col col-3">
									<div class="inline-group">
										<label class="radio">
											<input type="radio" name="auto_verify" value="1" <?php getChecked($core->auto_verify, 1); ?>>
										<i></i><?php echo $lang['tools-config14'] ?></label>
										<label class="radio">
											<input type="radio" name="auto_verify" value="0" <?php getChecked($core->auto_verify, 0); ?>>
										<i></i><?php echo $lang['tools-config15'] ?></label>
									</div>
									<div class="note"><?php echo $lang['tools-config18'] ?> <i class="icon-exclamation-sign  tooltip" data-title="<?php echo $lang['tools-config19'] ?>"></i></div>
								</section>
								<section class="col col-3">
									<div class="inline-group">
										<label class="radio">
											<input type="radio" name="reg_allowed" value="1" <?php getChecked($core->reg_allowed, 1); ?>>
										<i></i><?php echo $lang['tools-config14'] ?></label>
										<label class="radio">
											<input type="radio" name="reg_allowed" value="0" <?php getChecked($core->reg_allowed, 0); ?>>
										<i></i><?php echo $lang['tools-config15'] ?></label>
									</div>
									<div class="note"><?php echo $lang['tools-config20'] ?> <i class="icon-exclamation-sign  tooltip" data-title="<?php echo $lang['tools-config21'] ?>"></i></div>
								</section>
								<section class="col col-3">
									<div class="inline-group">
										<label class="radio">
											<input type="radio" name="notify_admin" value="1" <?php getChecked($core->notify_admin, 1); ?>>
										<i></i><?php echo $lang['tools-config14'] ?></label>
										<label class="radio">
										<input type="radio" name="notify_admin" value="0" <?php getChecked($core->notify_admin, 0); ?>>
										<i></i><?php echo $lang['tools-config15'] ?></label>
									</div>
									<div class="note"><?php echo $lang['tools-config22'] ?> <i class="icon-exclamation-sign  tooltip" data-title="<?php echo $lang['tools-config23'] ?>"></i></div>
								</section>
							</div>
							<hr />
							<header><b>Logo and Favicon</b></header>
							<div class="row">
								<section class="col col-2" style="display:none">
									<label class="input"><i class="icon-append icon-exclamation-sign  tooltip" data-title="<?php echo $lang['tools-config25'] ?>"></i>
										<input type="text" name="user_limit" value="<?php echo $core->user_limit;?>" placeholder="<?php echo $lang['tools-config24'] ?>">
									</label>
									<div class="note"><?php echo $lang['tools-config24'] ?></div>
								</section>
								
								<section class="col col-4">
									<label class="input">
										<input name="favicon" type="file" class="fileinput"/>
									</label>
									<div class="note"><?php echo $lang['tools-config26'] ?>, size 48 x 48</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input name="logo" type="file" class="fileinput"/>
									</label>
									<div class="note"><?php echo $lang['tools-config27'] ?>, size 190 x 39</div>
								</section>
								<section class="col col-4">
									<div class="inline-group">
										<label class="checkbox">
											<input name="dellogo" type="checkbox" value="1" class="checkbox"/>
										<i></i><?php echo $lang['tools-config28'] ?></label>
									</div>
									<div class="note"><?php echo $lang['tools-config29'] ?></div>
								</section>
							</div>
							<hr />
							<header><b><?php echo $lang['tools-config30'] ?></b> => <img src='assets/images/alert/paypal.jpg' width='153' /></header>
							<div class="row">
								<section class="col col-4">
									<label class="input">
										<input type="text" name="account_paypal" value="<?php echo $core->account_paypal;?>" placeholder="<?php echo $lang['tools-config31'] ?>">
									</label>
									<div class="note"><i class="fas fa-at"></i> <?php echo $lang['tools-config31'] ?></div>
								</section>
								<section class="col col-8">
									<label class="input">
										<input type="text" name="client_id" value="<?php echo $core->client_id;?>" placeholder="<?php echo $lang['tools-config32'] ?>">
									</label>
									<div class="note"><i class="far fa-id-card"></i> <?php echo $lang['tools-config32'] ?></div>
								</section>
								</br></br>
							</div>
							
							<hr />
							<header><b><?php echo $lang['tools-config33'] ?></b></header>
							<div class="row">
								<section class="col col-6">
									<select class="custom-select col-12" name="timezone">
										<option><?php echo $core->timezone;?></option>
										<?php foreach ($zonerow as $row):?>
										<option value="<?php echo $row->zone_name; ?>"><?php echo $row->zone_name; ?></option>
										<?php endforeach;?>
									</select>
									<div class="note"><?php echo $lang['tools-config34'] ?></div>
								</section>
								<section class="col col-2">
									<div align="right"><img src='assets/images/alert/lang.png' width='54' /></div>
								</section>
								<section class="col col-4">
									<select name="language" class="custom-select col-12" data-width="fit">
									 <optgroup label="Pacific Time Zone">
										<option value="en"<?php if ($core->language == "en") echo " selected=\"selected\"";?> data-flag="us"> <?php echo $lang['tools-config63'] ?></option>
										<option value="es"<?php if ($core->language == "es") echo " selected=\"selected\"";?> data-flag="es"> <?php echo $lang['tools-config64'] ?></option>
										<option value="fr"<?php if ($core->language == "fr") echo " selected=\"selected\"";?> data-flag="fr"> <?php echo $lang['tools-config65'] ?></option>
										<option value="it"<?php if ($core->language == "it") echo " selected=\"selected\"";?> data-flag="it"> <?php echo $lang['tools-config66'] ?></option>
										<option value="ru"<?php if ($core->language == "ru") echo " selected=\"selected\"";?> data-flag="ru"> Russian</option>
										</optgroup>
									</select>
									<div class="note"><?php echo $lang['tools-config62'] ?></div>
								</section>
							</div>
							<hr />
							<header><b><?php echo $lang['tools-config53'] ?></b></header>
							<div class="row">
								<section class="col col-6">
									<select name="mailer" id="mailerchange">
										<option value="PHP"<?php if ($core->mailer == "PHP") echo " selected=\"selected\"";?>>PHP Mailer</option>
										<option value="SMTP"<?php if ($core->mailer == "SMTP") echo " selected=\"selected\"";?>>SMTP Mailer</option>
									</select>
									<div class="note"><?php echo $lang['tools-config54'] ?></div>
								</section>
							</div>
							<div class="row showsmtp">
								<section class="col col-4">
									<label class="input"> <i class="icon-prepend icon-asterisk"></i> <i class="icon-append icon-exclamation-sign  tooltip" data-title="<?php echo $lang['tools-config60'] ?>"></i>
										<input type="text" name="smtp_host" value="<?php echo $core->smtp_host;?>" placeholder="SMTP Hostname">
									</label>
									<div class="note note">SMTP Hostname</div>
								</section>
								<section class="col col-4">
									<label class="input"> <i class="icon-prepend icon-asterisk"></i>
										<input type="text" name="smtp_user" value="<?php echo $core->smtp_user;?>" placeholder="SMTP Username">
									</label>
									<div class="note">SMTP Username</div>
								</section>
								<section class="col col-4">
									<label class="input"> <i class="icon-prepend icon-asterisk"></i>
										<input type="password" name="smtp_pass" value="<?php echo $core->smtp_pass;?>" placeholder="SMTP Password">
									</label>
									<div class="note">SMTP Password</div>
								</section>
							</div>
							<div class="row showsmtp">
								<section class="col col-4">
									<div class="inline-group">
										<label class="label">Requires SSL</label>
										<label class="radio">
											<input type="radio" name="is_ssl" value="1" <?php getChecked($core->is_ssl, 1); ?>>
											<i></i><?php echo $lang['tools-config14'] ?>
										</label>
										<label class="radio">
											<input type="radio" name="is_ssl" value="0" <?php getChecked($core->is_ssl, 0); ?>>
											<i></i><?php echo $lang['tools-config15'] ?>
										</label>
									</div>
									<div class="note"><?php echo $lang['tools-config55'] ?></div>
								</section>
								<section class="col col-4">
									<label class="input"> <i class="icon-prepend icon-asterisk"></i> <i class="icon-append icon-exclamation-sign  tooltip" data-title="<?php echo $lang['tools-config59'] ?>"></i>
										<input type="text" name="smtp_port" value="<?php echo $core->smtp_port;?>" placeholder="SMTP Port">
									</label>
									<div class="note">SMTP Port</div>
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
<?php echo Core::doForm("processConfig");?> 
<script type="text/javascript">
// <![CDATA[
$(document).ready(function () {
	var res2 = '<?php echo $core->mailer;?>';
		(res2 == "SMTP" ) ? $('.showsmtp').show() : $('.showsmtp').hide();
    $('#mailerchange').change(function () {
		var res = $("#mailerchange option:selected").val();
		(res == "SMTP" ) ? $('.showsmtp').show() : $('.showsmtp').hide();
	});
	
});
// ]]>
</script>
