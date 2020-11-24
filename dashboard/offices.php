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


<!-- List of Offices -->
<?php switch(Filter::$action): case "edit-office": ?>
<?php $row_off = Core::getRowById(Core::oTable, Filter::$id);?>
<div class="row justify-content-center">
	<div class="col-lg-8">
		<div class="row">
			<!-- Column -->
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div id="msgholder"></div>
						<form class="xform" id="admin_form" method="post">
							<header><?php echo $lang['tools-office1'] ?><span><?php echo $lang['tools-office2'] ?> <i class="icon-double-angle-right"></i> <?php echo $row_off->name_off;?></span></header>
							<div class="row">
								<section class="col col-4">
									<label class="input">
										<input type="text" name="name_off" value="<?php echo $row_off->name_off;?>" placeholder="<?php echo $lang['tools-office1'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-office1'] ?></div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="code_off" value="<?php echo $row_off->code_off;?>" placeholder="<?php echo $lang['tools-office23'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-office23'] ?></div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="address" value="<?php echo $row_off->address;?>" placeholder="<?php echo $lang['tools-office3'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-office3'] ?></div>
								</section>
							</div>
							<div class="row">
								<section class="col col-6">
									<label class="input">
										<input type="text" name="city" value="<?php echo $row_off->city;?>" placeholder="<?php echo $lang['tools-office4'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-office4'] ?></div>
								</section>
								<section class="col col-6">
									<label class="input">
										<input type="text" name="phone_off" value="<?php echo $row_off->phone_off;?>" placeholder="<?php echo $lang['tools-office5'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-office5'] ?></div>
								</section>
							</div>
							<footer>
								<button class="button" name="dosubmit" type="submit"><?php echo $lang['tools-office6'] ?><span><i class="ti-reload"></i></span></button>
								<a href="tools.php?do=offices" class="button button-secondary"><span><i class="ti-share-alt"></i></span> <?php echo $lang['tools-office7'] ?></a> 
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
<?php echo Core::doForm("processOffices");?> 

<?php break;?>
<?php case "add-office":?>
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
							<header><?php echo $lang['tools-office9'] ?><span><?php echo $lang['tools-office8'] ?></span></header>
							<div class="row">
								<section class="col col-4">
									<label class="input">
										<input type="text" name="name_off" placeholder="<?php echo $lang['tools-office9'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-office9'] ?></div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="code_off" placeholder="<?php echo $lang['tools-office23'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-office23'] ?></div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="address" placeholder="<?php echo $lang['tools-office10'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-office10'] ?></div>
								</section>
							</div>
							<div class="row">
								<section class="col col-6">
									<label class="input">
										<input type="text" name="city" placeholder="<?php echo $lang['tools-office11'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-office11'] ?></div>
								</section>
								<section class="col col-6">
									<label class="input">
										<input type="text" name="phone_off" placeholder="<?php echo $lang['tools-office12'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-office12'] ?></div>
								</section>
							</div>
							<footer>
								<button class="button" name="dosubmit" type="submit"><?php echo $lang['tools-office13'] ?><span><i class="ti-briefcase"></i></span></button>
								<a href="tools.php?do=offices" class="button button-secondary"><span><i class="ti-share-alt"></i></span> <?php echo $lang['tools-office7'] ?></a> 
							</footer>
						</form>
					</div>
				</div>
			</div>
			<!-- Column -->
		</div>
	</div>
</div>
<?php echo Core::doForm("processOffices");?> 

<?php break;?>
<?php default: ?>
<?php $officesrow = $core->getOffices();?>
<div class="row justify-content-center">
	<div class="col-lg-8">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="d-md-flex align-items-center">
							<div>
								<h3 class="card-title"><?php echo $lang['tools-office14'] ?></h3>
							</div>
						</div>
						<!-- column -->
						<div id="loader" style="display:none"></div>
						<div id="msgholder"></div>
						<div class="table-responsive">
							<table id="zero_config" class="table table-bordered table-condensed table-hover table-striped">
								<thead>
									<tr>
										<th data-sort-initial="true" data-toggle="true"><b><?php echo $lang['tools-office15'] ?></b></th>
										<th data-sort-initial="true" data-toggle="true"><b><?php echo $lang['tools-office23'] ?></b></th>
										<th data-hide="Address"><b><?php echo $lang['tools-office16'] ?></b></th>
										<th data-hide="City"><b><?php echo $lang['tools-office17'] ?></b></th>
										<th data-hide="Phone"><b><?php echo $lang['tools-office18'] ?></b></th>
										<th data-sort-ignore="true" class="text-center"><b><?php echo $lang['tools-office19'] ?>n</b></th>
									</tr>
								</thead>
								<div class="m-t-0">
									<div class="d-flex">
										<div class="mr-auto">
											<div class="form-group">
												<a href="tools.php?do=offices&amp;action=add-office"><button id="demo-btn-addrow" class="btn btn-secondary btn-sm"><i class="ti-plus" aria-hidden="true"></i> <?php echo $lang['tools-office20'] ?></button></a> 
											</div>
										</div>
									</div>
								</div>
								<tbody>
									<?php if(!$officesrow):?>
									<tr>
										<td colspan="5">
										<?php echo "
										<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_shipment.png' width='130' /></i>								
										",false;?>
										</td>
									</tr>
									<?php else:?>
									<?php foreach ($officesrow as $row):?>
									<tr>
										<td><?php echo $row->name_off;?></td>
										<td><?php echo $row->code_off;?></td>
										<td><?php echo $row->address;?></td>
										<td><?php echo $row->city;?></td>
										<td><?php echo $row->phone_off;?></td>
										<td class="text-center">
											<a href="tools.php?do=offices&amp;action=edit-office&amp;id=<?php echo $row->id;?>"><button type="button" class="btn btn-sm btn-icon btn-pure btn-outline" data-toggle="tooltip" data-original-title="<?php echo $lang['tools-office21'] ?>"><i class="ti-pencil" aria-hidden="true"></i></button></a>
											<a id="item_<?php echo $row->id;?>" class="delete" data-rel="<?php echo $row->name_off;?>"><button type="button" class="btn btn-sm btn-icon btn-pure btn-outline" data-toggle="tooltip" data-original-title="<?php echo $lang['tools-office22'] ?>"><i class="ti-close" aria-hidden="true"></i></button></a>
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
<?php echo Core::doDelete("Delete Office","deleteOffice");?> 
<?php break;?>
<?php endswitch;?>