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
<?php $row = Core::getRowById(Core::eTable, Filter::$id);?>
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="row">
			<!-- Column -->
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<form class="xform" id="admin_form" method="post">
							<header><?php echo $lang['tools-template1'] ?><span><?php echo $lang['tools-template2'] ?> <i class="icon-double-angle-right"></i> <?php echo $row->name;?></span></header>
							<div class="row">
								<section class="col col-6">
									<label class="input"> <i class="icon-append icon-asterisk"></i>
										<input type="text" name="name" value="<?php echo $row->name;?>" placeholder="<?php echo $lang['tools-template3'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-template3'] ?></div>
								</section>
								<section class="col col-6">
									<label class="input"> <i class="icon-append icon-asterisk"></i>
										<input type="text" name="subject" value="<?php echo $row->subject;?>" placeholder="<?php echo $lang['tools-template4'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-template4'] ?></div>
								</section>
							</div>
							<hr>
							<div class="row">
								<section class="col col-12">
									<label class="textarea">
										<textarea name="help" rows="3"><?php echo $row->help;?></textarea>
									</label>
									<div class="note"><?php echo $lang['tools-template5'] ?></div>
								</section>
							</div>
								<section>
									<div id="editor">
										<textarea name="body" id="summernote" style="margin-top: 30px;" placeholder="Type some text">
											<?php echo $row->body;?>
										</textarea>
									</div>
									<div class="label2 label-important"><?php echo $lang['tools-template6'] ?> [ ]</div>
								</section>
							<footer>
								<button class="button" name="dosubmit" type="submit"><?php echo $lang['tools-template7'] ?><span><i class="icon-ok"></i></span></button>
								<a href="user.php?do=templates" class="button button-secondary"><span><i class="ti-share-alt"></i></span> <?php echo $lang['tools-template8'] ?></a> 
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
<?php echo Core::doForm("processEmailTemplate");?>
<?php break;?>
<?php default: ?>
<?php $temprow = $core->getEmailTemplates();?>
<div class="row justify-content-center">
	<div class="col-lg-10">
		<div class="row">
			<!-- Column -->
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">						
						<div class="row">
						  <h2><i class="ti-email"></i><?php echo $lang['tools-template9'] ?></h2>
						</div>
						<div class="table-responsive">
							<table id="zero_config" class="table table-bordered table-condensed table-hover table-striped">
								<thead>
									<tr>
										<th class="header"><b><?php echo $lang['tools-template10'] ?></b></b></th>
										<th><b><?php echo $lang['tools-template11'] ?></b></th>
										<th class="text-center"><b><?php echo $lang['tools-template12'] ?></b></th>
									</tr>
								</thead>
								<tbody>
									<?php if(!$temprow):?>
									<tr>
										<td colspan="3">
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
										<td class="text-center">
											<a href="user.php?do=templates&amp;action=edit&amp;id=<?php echo $row->id;?>" class='btn waves-effect waves-light btn-outline-info top-btn'><span class="ti-pencil"></span></a>
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
<?php break;?>
<?php endswitch;?>


<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>