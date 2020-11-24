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

<link href="../assets/css_log/front.css" rel="stylesheet" type="text/css">
	
<script type="text/javascript" src="../assets/js/jquery.js"></script>
<script type="text/javascript" src="../assets/js/jquery-ui.js"></script>
<script src="../assets/js/jquery.ui.touch-punch.js"></script>
<script src="../assets/js/jquery.wysiwyg.js"></script>
<script src="../assets/js/global.js"></script>
<script src="../assets/js/custom.js"></script>

<?php switch(Filter::$action): case "edit": ?>
<?php $row = Core::getRowById(Core::twTable, Filter::$id);?>
<div class="row justify-content-center">
	<div class="col-lg-8">
		<div class="row">
			<!-- Column -->
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div id="msgholder"></div>
						<form class="xform" id="admin_form" method="post">
							<header><?php echo $lang['tools-twilio9'] ?><span><?php echo $lang['tools-twilio10'] ?> <i class="icon-double-angle-right"></i> <?php echo $row->account_sid;?></span></header>
							<div class="row">
								<section class="col col-6">
									<label class="input"> <i class="icon-append icon-asterisk"></i>
										<input type="text" name="account_sid" value="<?php echo $row->account_sid;?>" placeholder="<?php echo $lang['tools-twilio11'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-twilio11'] ?></div>
								</section>
								<section class="col col-6">
									<label class="input"> <i class="icon-append icon-asterisk"></i>
										<input type="text" name="auth_token" value="<?php echo $row->auth_token;?>" placeholder="<?php echo $lang['tools-twilio12'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-twilio12'] ?></div>
								</section>
							</div>
							<div class="row">
								<section class="col col-6">
									<label class="input"> <i class="icon-append icon-asterisk"></i>
										<input type="text" name="namesms" value="<?php echo $row->namesms;?>"  placeholder="<?php echo $lang['tools-twilio13'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-twilio13'] ?></div>
								</section>
								<section class="col col-6">
									<label class="input"> <i class="icon-append icon-asterisk"></i>
										<input type="text" name="twilio_number" value="<?php echo $row->twilio_number;?>"  placeholder="<?php echo $lang['tools-twilio14'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-twilio14'] ?></div>
								</section>
								<section class="col col-6">
									<div class="inline-group">
										<label class="radio">
											<input type="radio" name="active_twi" value="1" <?php getChecked($row->active_twi, 1); ?>>
											<i></i><?php echo $lang['tools-twilio15'] ?></label>
										<label class="radio">
											<input type="radio" name="active_twi" value="0" <?php getChecked($row->active_twi, 0); ?>>
											<i></i><?php echo $lang['tools-twilio16'] ?></label>
									</div>
									<div class="note"><?php echo $lang['tools-twilio17'] ?></div>
								</section>
							</div>
							<footer>
							<button class="button" name="dosubmit" type="submit"><?php echo $lang['tools-twilio18'] ?><span><i class="icon-ok"></i></span></button>
								<a href="tools.php?do=sms" class="button button-secondary"><span><i class="ti-share-alt"></i></span> <?php echo $lang['tools-twilio19'] ?></a> 
							</footer>
							<input name="id" type="hidden" value="<?php echo Filter::$id;?>" />
						</form>
					</div>
				</div>
			</div>
			<!-- Column -->
		</div>
	</div>
</div>							
<?php echo Core::doForm("processSmstwilio");?> 
<?php break;?>
<?php default: ?>

<script type="text/javascript"> 
// <![CDATA[
$(document).ready(function () {
    $('a.activate').on('click', function () {
        var uid = $(this).attr('id').replace('act_', '')
        var text = "<i class=\"icon-warning-sign icon-3x pull-left\"></i>Are you sure you want to activate this SMS TWILIO?<br />";
        new Messi(text, {
            title: "Activate SMS TWILIO",
            modal: true,
            closeButton: true,
            buttons: [{
                id: 0,
                label: "Activate",
                val: '1'
            }],
			  callback: function (val) {
				  $.ajax({
					  type: 'post',
					  url: "controller.php",
					  data: {
						  activateTwilio: 1,
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

});
// ]]>
</script>

<?php break;?>
<?php endswitch;?>