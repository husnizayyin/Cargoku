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
<?php $row = Core::getRowById(Core::tnxTable, Filter::$id);?>
<div class="row justify-content-center">
	<div class="col-lg-8">
		<div class="row">
			<!-- Column -->
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div id="msgholder"></div>
						<form class="xform" id="admin_form" method="post">
							<header><?php echo $lang['tools-nexmo9'] ?><span><?php echo $lang['tools-nexmo10'] ?> <i class="icon-double-angle-right"></i> <?php echo $row->api_key;?></span></header>
							<div class="row">
								<section class="col col-6">
									<label class="input"> <i class="icon-append icon-asterisk"></i>
										<input type="text" name="api_key" value="<?php echo $row->api_key;?>" placeholder="<?php echo $lang['tools-nexmo11'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-nexmo11'] ?></div>
								</section>
								<section class="col col-6">
									<label class="input"> <i class="icon-append icon-asterisk"></i>
										<input type="text" name="api_secret" value="<?php echo $row->api_secret;?>" placeholder="<?php echo $lang['tools-nexmo12'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-nexmo12'] ?></div>
								</section>
							</div>
							<div class="row">
								<section class="col col-6">
									<label class="input"> <i class="icon-append icon-asterisk"></i>
										<input type="text" name="namesms" value="<?php echo $row->namesms;?>"  placeholder="<?php echo $lang['tools-nexmo13'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-nexmo13'] ?></div>
								</section>
								<section class="col col-6">
									<label class="input"> <i class="icon-append icon-asterisk"></i>
										<input type="text" name="nexmo_number" value="<?php echo $row->nexmo_number;?>"  placeholder="<?php echo $lang['tools-nexmo14'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-nexmo14'] ?></div>
								</section>
								<section class="col col-6">
									<div class="inline-group">
										<label class="radio">
											<input type="radio" name="active_nex" value="1" <?php getChecked($row->active_nex, 1); ?>>
											<i></i><?php echo $lang['tools-nexmo15'] ?></label>
										<label class="radio">
											<input type="radio" name="active_nex" value="0" <?php getChecked($row->active_nex, 0); ?>>
											<i></i><?php echo $lang['tools-nexmo16'] ?></label>
									</div>
									<div class="note"><?php echo $lang['tools-nexmo17'] ?></div>
								</section>
							</div>
							<footer>
							<button class="button" name="dosubmit" type="submit"><?php echo $lang['tools-nexmo18'] ?><span><i class="icon-ok"></i></span></button>
								<a href="tools.php?do=sms" class="button button-secondary"><span><i class="ti-share-alt"></i></span> <?php echo $lang['tools-nexmo19'] ?></a> 
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
<?php echo Core::doForm("processSmsnexmo");?> 
<?php break;?>
<?php default: ?>


<script type="text/javascript"> 
// <![CDATA[
$(document).ready(function () {
    $('a.activatenex').on('click', function () {
        var uid = $(this).attr('id').replace('act_', '')
        var text = "<i class=\"icon-warning-sign icon-3x pull-left\"></i>Are you sure you want to activate this SMS NEXMO?<br />";
        new Messi(text, {
            title: "Activate SMS NEXMO",
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
						  activateNexmo: 1,
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