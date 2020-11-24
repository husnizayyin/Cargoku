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

<?php switch(Filter::$action): case "edit": ?>
<?php $row = Core::getRowById(Core::smsTable, Filter::$id);?>
<div class="row justify-content-center">
	<div class="col-lg-8">
		<div class="row">
			<!-- Column -->
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<form class="xform" id="admin_form" method="post">
							<header><?php echo $lang['tools-smstemplate1'] ?><span><?php echo $lang['tools-smstemplate2'] ?> <i class="icon-double-angle-right"></i> <?php echo $row->name;?></span></header>
							<div class="row">
								<section class="col col-6">
									<label class="input"> <i class="icon-append icon-asterisk"></i>
										<input type="text" name="name" value="<?php echo $row->name;?>" placeholder="<?php echo $lang['tools-smstemplate3'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-smstemplate3'] ?></div>
								</section>
								
								<section class="col col-6">
									<label class="textarea">
										<textarea name="help" rows="3"><?php echo $row->help;?></textarea>
									</label>
									<div class="note"><?php echo $lang['tools-smstemplate4'] ?></div>
								</section>
							</div>
							<hr>
							<div class="row">
							<section class="col col-12">
							<b><i class="ti-comments-smiley"></i> <?php echo $lang['tools-smstemplate5'] ?></b></br>
							</section>
							</div>
							<div class="row">
								<section class="col col-6">
									<label class="textarea">
										<textarea name="body1" rows="2"><?php echo $row->body1;?></textarea>
									</label>
								</section>
								<section class="col col-3">
									<label class="textarea">
										<textarea name="body2" rows="2"><?php echo $row->body2;?></textarea>
									</label>
								</section>
								<section class="col col-3">
									<label class="textarea">
										<textarea name="body3" rows="2"><?php echo $row->body3;?></textarea>
									</label>
								</section>
								<section class="col col-6">
									<div class="inline-group">
										<label class="radio">
											<input type="radio" name="active" value="1" <?php getChecked($row->active, 1); ?>>
											<i></i><?php echo $lang['tools-smstemplate6'] ?></label>
										<label class="radio">
											<input type="radio" name="active" value="0" <?php getChecked($row->active, 0); ?>>
											<i></i><?php echo $lang['tools-smstemplate7'] ?></label>
									</div>
									<div class="note"><?php echo $lang['tools-smstemplate8'] ?></div>
								</section>
							</div>	
							<footer>
								<button class="button" name="dosubmit" type="submit"><?php echo $lang['tools-smstemplate9'] ?><span><i class="icon-ok"></i></span></button>
								<a href="tools.php?do=templates_sms" class="button button-secondary"><span><i class="ti-share-alt"></i></span> <?php echo $lang['tools-smstemplate10'] ?></a> 
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
<?php echo Core::doForm("processSmsTemplate");?>
<?php break;?>
<?php default: ?>
<?php $temprow = $core->getSmsTemplates();?>
<div class="row justify-content-center">
	<div class="col-lg-12">
		<div class="row">
			<!-- Column -->
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">						
						<div class="row">
						  <h3><i class="ti-email"></i> <?php echo $lang['tools-smstemplate11'] ?></h3>
						</div>
						<div class="table-responsive">
							<table id="zero_config" class="table table-bordered table-condensed table-hover table-striped">
								<thead>
									<tr>
										<th class="header"><b><?php echo $lang['tools-smstemplate12'] ?></b></b></th>
										<th><b><?php echo $lang['tools-smstemplate13'] ?></b></th>
										<th class="text-center"><b><?php echo $lang['tools-smstemplate14'] ?></b></th>
										<th class="text-center"><b><?php echo $lang['tools-smstemplate15'] ?></b></th>
									</tr>
								</thead>
								<tbody>
									<?php if(!$temprow):?>
									<tr>
										<td colspan="4">
										<?php echo "
										<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_shipment.png' width='130' /></i>								
										",false;?>
										</td>
									</tr>
									<?php else:?>
									<?php foreach ($temprow as $row):?>
									<tr>
										<td class="nowrap"><?php echo $row->name;?></td>
										<td><?php echo $row->help;?></td>
										<td class="text-center"><?php echo isActivesms($row->active, $row->id);?></td>
										<td class="text-center">
											<a href="tools.php?do=templates_sms&amp;action=edit&amp;id=<?php echo $row->id;?>" class='btn waves-effect waves-light btn-outline-info top-btn'><span class="ti-pencil"></span></a>
										</td>
									</tr>
									<?php endforeach;?>
									<?php unset($row);?>
									<?php endif;?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<!-- Column -->
		</div>
	</div>
</div>
<script type="text/javascript"> 
// <![CDATA[
$(document).ready(function () {
    $('a.activate').on('click', function () {
        var uid = $(this).attr('id').replace('act_', '')
        var text = "<i class=\"icon-warning-sign icon-3x pull-left\"></i>Are you sure you want to activate this TEMPLATE SMS?<br />";
        new Messi(text, {
            title: "Activate TEMPLATE SMS",
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
						  activateSMS: 1,
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