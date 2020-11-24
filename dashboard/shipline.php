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
<?php switch(Filter::$action): case "edit-shipline": ?>
<?php $row_off = Core::getRowById(Core::slineTable, Filter::$id);?>
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="row">
			<!-- Column -->
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div id="msgholder"></div>
						<form class="xform" id="admin_form" method="post">
							<header><?php echo $lang['tools-shipline1'] ?><span><?php echo $lang['tools-shipline2'] ?> <i class="icon-double-angle-right"></i> <?php echo $row_off->ship_line;?></span></header>
							<div class="row">
								<section class="col col-6">
									<label class="input">
										<input type="text" name="ship_line" value="<?php echo $row_off->ship_line;?>" placeholder="<?php echo $lang['tools-shipline1'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-shipline1'] ?></div>
								</section>
								<section class="col col-6">
									<label class="input">
										<input type="text" name="detail" value="<?php echo $row_off->detail;?>" placeholder="<?php echo $lang['tools-shipline3'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-shipline3'] ?></div>
								</section>
							</div>
							<footer>
								<button class="button" name="dosubmit" type="submit"><?php echo $lang['tools-shipline4'] ?><span><i class="ti-reload"></i></span></button>
								<a href="tools.php?do=shipline" class="button button-secondary"><span><i class="ti-share-alt"></i></span> <?php echo $lang['tools-shipline5'] ?></a> 
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
<?php echo Core::doForm("processShipline");?> 

<?php break;?>
<?php case "add-shipline":?>
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
							<header><?php echo $lang['tools-shipline6'] ?><span><?php echo $lang['tools-shipline7'] ?></span></header>
							<div class="row">
								<section class="col col-6">
									<label class="input">
										<input type="text" name="ship_line" placeholder="<?php echo $lang['tools-shipline6'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-shipline6'] ?></div>
								</section>
								<section class="col col-6">
									<label class="input">
										<input type="text" name="detail" placeholder="<?php echo $lang['tools-shipline8'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-shipline8'] ?></div>
								</section>
							</div>
							<footer>
								<button class="button" name="dosubmit" type="submit"><?php echo $lang['tools-shipline9'] ?><span><i class="ti-briefcase"></i></span></button>
								<a href="tools.php?do=shipline" class="button button-secondary"><span><i class="ti-share-alt"></i></span> <?php echo $lang['tools-shipline5'] ?></a> 
							</footer>
						</form>
					</div>
				</div>
			</div>
			<!-- Column -->
		</div>
	</div>
</div>
<?php echo Core::doForm("processShipline");?> 

<?php break;?>
<?php default: ?>
<?php $moderow = $core->getShipline();?>
<div class="row justify-content-center">
	<div class="col-lg-8">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="d-md-flex align-items-center">
							<div>
								<h3 class="card-title"><?php echo $lang['tools-shipline10'] ?></h3>
							</div>
						</div>
						<!-- column -->
						<div id="loader" style="display:none"></div>
						<div id="msgholder"></div>
						<div class="table-responsive">
							<table id="zero_config" class="table table-bordered table-condensed table-hover table-striped">
								<thead>
									<tr>
										<th data-sort-initial="true" data-toggle="true"><b><?php echo $lang['tools-shipline11'] ?></b></th>
										<th data-hide="Description"><b><?php echo $lang['tools-shipline12'] ?></b></th>
										<th data-sort-ignore="true" class="text-center"><b><?php echo $lang['tools-shipline13'] ?></b></th>
									</tr>
								</thead>
								<div class="m-t-0">
									<div class="d-flex">
										<div class="mr-auto">
											<div class="form-group">
												<a href="tools.php?do=shipline&amp;action=add-shipline"><button id="demo-btn-addrow" class="btn btn-secondary btn-sm"><i class="ti-plus" aria-hidden="true"></i> <?php echo $lang['tools-shipline14'] ?></button></a> 
											</div>
										</div>
									</div>
								</div>
								<tbody>
									<?php if(!$moderow):?>
									<tr>
										<td colspan="3">
										<?php echo "
										<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_shipment.png' width='130' /></i>								
										",false;?>
										</td>
									</tr>
									<?php else:?>
									<?php foreach ($moderow as $row):?>
									<tr>
										<td><?php echo $row->ship_line;?></td>
										<td><?php echo $row->detail;?></td>
										<td class="text-center">
											<a href="tools.php?do=shipline&amp;action=edit-shipline&amp;id=<?php echo $row->id;?>"><button type="button" class="btn btn-sm btn-icon btn-pure btn-outline" data-toggle="tooltip" data-original-title="<?php echo $lang['tools-shipline15'] ?>"><i class="ti-pencil" aria-hidden="true"></i></button></a>
											<a id="item_<?php echo $row->id;?>" class="delete" data-rel="<?php echo $row->ship_line;?>"><button type="button" class="btn btn-sm btn-icon btn-pure btn-outline" data-toggle="tooltip" data-original-title="<?php echo $lang['tools-shipline16'] ?>"><i class="ti-close" aria-hidden="true"></i></button></a>
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
<?php echo Core::doDelete("Delete Status","deleteShipline");?> 
<?php break;?>
<?php endswitch;?>