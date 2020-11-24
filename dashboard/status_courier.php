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
<link rel="stylesheet" type="text/css" href="assets/libs/%40claviska/jquery-minicolors/jquery.minicolors.css">
	
<script type="text/javascript" src="../assets/js/jquery.js"></script>
<script type="text/javascript" src="../assets/js/jquery-ui.js"></script>
<script src="../assets/js/jquery.ui.touch-punch.js"></script>
<script src="../assets/js/jquery.wysiwyg.js"></script>
<script src="../assets/js/global.js"></script>
<script src="../assets/js/custom.js"></script>


<!-- List of Offices -->
<?php switch(Filter::$action): case "edit-status": ?>
<?php $row_off = Core::getRowById(Core::yTable, Filter::$id);?>
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="row">
			<!-- Column -->
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div id="msgholder"></div>
						<form class="xform" id="admin_form" method="post">
							<header><?php echo $lang['tools-statuscourier1'] ?><span><?php echo $lang['tools-statuscourier2'] ?> <i class="icon-double-angle-right"></i> <?php echo $row_off->mod_style;?></span></header>
							<div class="row">
								<section class="col col-6">
									<label class="input">
										<input type="text" name="mod_style" value="<?php echo $row_off->mod_style;?>" placeholder="<?php echo $lang['tools-statuscourier1'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-statuscourier1'] ?></div>
								</section>
								<section class="col col-6">
									<label class="input">
										<input type="text" name="detail" value="<?php echo $row_off->detail;?>" placeholder="<?php echo $lang['tools-statuscourier3'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-statuscourier3'] ?></div>
								</section>
							</div>
							<div class="row">
								<section class="col col-6">
									<label class="input">
										<input type="text" name="color" value="<?php echo $row_off->color;?>" placeholder="<?php echo $lang['tools-statuscourier4'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-statuscourier4'] ?></div>
								</section>
							</div>
							<footer>
								<button class="button" name="dosubmit" type="submit"><?php echo $lang['tools-statuscourier5'] ?><span><i class="ti-reload"></i></span></button>
								<a href="tools.php?do=status_courier" class="button button-secondary"><span><i class="ti-share-alt"></i></span> <?php echo $lang['tools-statuscourier6'] ?></a> 
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
<?php echo Core::doForm("processStatus");?> 

<?php break;?>
<?php case "add-status":?>
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="row">
			<!-- Column -->
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div id="loader" style="display:none"></div>
						<div id="msgholder"></div>
						<form class="xform" id="admin_form" method="post">
							<header><?php echo $lang['tools-statuscourier7'] ?><span><?php echo $lang['tools-statuscourier8'] ?></span></header>
							<div class="row">
								<section class="col col-6">
									<label class="input">
										<input type="text" name="mod_style" placeholder="<?php echo $lang['tools-statuscourier1'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-statuscourier7'] ?></div>
								</section>
								<section class="col col-6">
									<label class="input">
										<input type="text" name="detail" placeholder="<?php echo $lang['tools-statuscourier9'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-statuscourier9'] ?></div>
								</section>
							</div>
							<div class="row">
								<section class="col col-6">
									<label class="input">
										<input type="text" name="color" id="position-top-right" class="form-control demo" data-position="top right" value="#0088cc">
									</label>
									<div class="note note-error"><?php echo $lang['tools-statuscourier10'] ?></div>
								</section>
							</div>
							<footer>
								<button class="button" name="dosubmit" type="submit"><?php echo $lang['tools-statuscourier11'] ?><span><i class="ti-briefcase"></i></span></button>
								<a href="tools.php?do=status_courier" class="button button-secondary"><span><i class="ti-share-alt"></i></span> <?php echo $lang['tools-statuscourier6'] ?></a> 
							</footer>
						</form>
					</div>
				</div>
			</div>
			<!-- Column -->
		</div>
	</div>
</div>
<?php echo Core::doForm("processStatus");?> 

<?php break;?>
<?php default: ?>
<?php $stylerow = $core->getStatus();?>
<div class="row justify-content-center">
	<div class="col-lg-8">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="d-md-flex align-items-center">
							<div>
								<h3 class="card-title"><?php echo $lang['tools-statuscourier12'] ?></h3>
							</div>
						</div>
						<!-- column -->
						<div id="loader" style="display:none"></div>
						<div id="msgholder"></div>
						<div class="table-responsive">
							<table id="zero_config" class="table table-bordered table-condensed table-hover table-striped">
								<thead>
									<tr>
										<th data-sort-initial="true" data-toggle="true"><b><?php echo $lang['tools-statuscourier13'] ?></b></th>
										<th data-hide="Description"><b><?php echo $lang['tools-statuscourier14'] ?></b></th>
										<th data-hide="Button"><b><?php echo $lang['tools-statuscourier15'] ?></b></th>
										<th data-sort-ignore="true" class="text-center"><b><?php echo $lang['tools-statuscourier16'] ?></b></th>
									</tr>
								</thead>
								<div class="m-t-0">
									<div class="d-flex">
										<div class="mr-auto">
											<div class="form-group">
												<a href="tools.php?do=status_courier&amp;action=add-status"><button id="demo-btn-addrow" class="btn btn-secondary btn-sm"><i class="ti-plus" aria-hidden="true"></i> <?php echo $lang['tools-statuscourier17'] ?></button></a> 
											</div>
										</div>
									</div>
								</div>
								<tbody>
									<?php if(!$stylerow):?>
									<tr>
										<td colspan="5">
										<?php echo "
										<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_shipment.png' width='130' /></i>								
										",false;?>
										</td>
									</tr>
									<?php else:?>
									<?php foreach ($stylerow as $row):?>
									<tr>
										<td><?php echo $row->mod_style;?></td>
										<td><?php echo $row->detail;?></td>
										<td><span style="background: <?php echo $row->color; ?>;"  class="label label-large" ><?php echo $row->color;?></span></td>
										<td class="text-center">
										<?php 	if ($row->mod_style == 'Pending') { ?>
										<a href="#"><button type="button" class="btn btn-sm btn-icon btn-secondary btn-outline" data-toggle="tooltip" data-original-title="Edit"><i class="ti-pencil" aria-hidden="true"></i></button></a>
										<a  class="delete" data-rel="<?php echo $row->mod_style;?>"><button type="button" class="btn btn-sm btn-icon btn-secondary btn-outline" data-toggle="tooltip" data-original-title="<?php echo $lang['tools-statuscourier19'] ?>"><i class="ti-close" aria-hidden="true"></i></button></a>
										
										<?php } else if ($row->mod_style == 'Delivered'){ ?>
										<a href="#"><button type="button" class="btn btn-sm btn-icon btn-secondary btn-outline" data-toggle="tooltip" data-original-title="Edit"><i class="ti-pencil" aria-hidden="true"></i></button></a>
										<a  class="delete" data-rel="<?php echo $row->mod_style;?>"><button type="button" class="btn btn-sm btn-icon btn-secondary btn-outline" data-toggle="tooltip" data-original-title="<?php echo $lang['tools-statuscourier19'] ?>"><i class="ti-close" aria-hidden="true"></i></button></a>
										<?php } else if ($row->mod_style == 'Approved'){ ?>
										<a href="#"><button type="button" class="btn btn-sm btn-icon btn-secondary btn-outline" data-toggle="tooltip" data-original-title="Edit"><i class="ti-pencil" aria-hidden="true"></i></button></a>
										<a  class="delete" data-rel="<?php echo $row->mod_style;?>"><button type="button" class="btn btn-sm btn-icon btn-secondary btn-outline" data-toggle="tooltip" data-original-title="<?php echo $lang['tools-statuscourier19'] ?>"><i class="ti-close" aria-hidden="true"></i></button></a>
										<?php }else if ($row->mod_style == 'Rejected'){ ?>
										<a href="#"><button type="button" class="btn btn-sm btn-icon btn-secondary btn-outline" data-toggle="tooltip" data-original-title="Edit"><i class="ti-pencil" aria-hidden="true"></i></button></a>
										<a  class="delete" data-rel="<?php echo $row->mod_style;?>"><button type="button" class="btn btn-sm btn-icon btn-secondary btn-outline" data-toggle="tooltip" data-original-title="<?php echo $lang['tools-statuscourier19'] ?>"><i class="ti-close" aria-hidden="true"></i></button></a>
										<?php } else { ?>
											<a href="tools.php?do=status_courier&amp;action=edit-status&amp;id=<?php echo $row->id;?>"><button type="button" class="btn btn-sm btn-icon btn-pure btn-outline" data-toggle="tooltip" data-original-title="<?php echo $lang['tools-statuscourier18'] ?>"><i class="ti-pencil" aria-hidden="true"></i></button></a>
											<a id="item_<?php echo $row->id;?>" class="delete" data-rel="<?php echo $row->mod_style;?>"><button type="button" class="btn btn-sm btn-icon btn-pure btn-outline" data-toggle="tooltip" data-original-title="<?php echo $lang['tools-statuscourier19'] ?>"><i class="ti-close" aria-hidden="true"></i></button></a>
										<?php } ?>	
										</td>
									</tr>
									<?php endforeach;?>
									<?php unset($row);?>
									<?php endif;?>	
								</tbody>	
							</table>
						</div>
						<!-- column -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php echo $pager->display_pages();?>
<?php echo Core::doDelete("Delete Status","deleteStatus");?> 
<?php break;?>
<?php endswitch;?>

<script src="assets/libs/jquery-asColor/dist/jquery-asColor.min.js"></script>
<script src="assets/libs/jquery-asGradient/dist/jquery-asGradient.js"></script>
<script src="assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js"></script>
<script src="assets/libs/%40claviska/jquery-minicolors/jquery.minicolors.min.js"></script>
<script>
$('.demo').each(function() {
	//
	// Dear reader, it's actually very easy to initialize MiniColors. For example:
	//
	//  $(selector).minicolors();
	//
	// The way I've done it below is just for the demo, so don't get confused
	// by it. Also, data- attributes aren't supported at this time...they're
	// only used for this demo.
	//
	$(this).minicolors({
		control: $(this).attr('data-control') || 'hue',
		defaultValue: $(this).attr('data-defaultValue') || '',
		format: $(this).attr('data-format') || 'hex',
		keywords: $(this).attr('data-keywords') || '',
		inline: $(this).attr('data-inline') === 'true',
		letterCase: $(this).attr('data-letterCase') || 'lowercase',
		opacity: $(this).attr('data-opacity'),
		position: $(this).attr('data-position') || 'bottom left',
		swatches: $(this).attr('data-swatches') ? $(this).attr('data-swatches').split('|') : [],
		change: function(value, opacity) {
			if (!value) return;
			if (opacity) value += ', ' + opacity;
			if (typeof console === 'object') {
				console.log(value);
			}
		},
		theme: 'bootstrap'
	});

});
</script>