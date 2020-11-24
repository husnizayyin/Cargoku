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
<?php switch(Filter::$action): case "edit-ship_rates": ?>
<?php $row_rates = Core::getRowById(Core::raTable, Filter::$id);?>
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="row">
			<!-- Column -->
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div id="msgholder"></div>
						<div class="responsive">
							<form class="xform" id="admin_form" method="post">
								<header><?php echo $lang['ship-rate1'] ?><span><?php echo $lang['ship-rate2'] ?> <i class="icon-double-angle-right"></i> <?php echo $row_rates->n_courier;?></span></header>
								<div class="row">
									<section class="col col-4">
										<label class="input">
											<input type="text" name="n_courier" value="<?php echo $row_rates->n_courier;?>" placeholder="<?php echo $lang['ship-rate3'] ?>">
										</label>
										<div class="note note-error"><?php echo $lang['ship-rate4'] ?></div>
									</section>
									<section class="col col-4">
										<label class="input">
											<input type="text" name="services" value="<?php echo $row_rates->services;?>" placeholder="<?php echo $lang['ship-rate5'] ?>">
										</label>
										<div class="note note-error"><?php echo $lang['ship-rate5'] ?></div>
									</section>
									<section class="col col-4">
										<label class="input">
											<input type="text" name="weight" value="<?php echo $row_rates->weight;?>" placeholder="<?php echo $lang['ship-rate6'] ?>">
										</label>
										<div class="note note-error"><?php echo $lang['ship-rate6'] ?></div>
									</section>
								</div>
								<div class="row">
									<section class="col col-4">
										<label class="input">
											<input type="text" name="rate" value="<?php echo $row_rates->rate;?>" placeholder="<?php echo $lang['ship-rate7'] ?>">
										</label>
										<div class="note note-error"><?php echo $lang['ship-rate7'] ?></div>
									</section>
									<section class="col col-4">
										<label class="input">
											<input type="text" name="deli_time" value="<?php echo $row_rates->deli_time;?>" placeholder="<?php echo $lang['ship-rate8'] ?>">
										</label>
										<div class="note note-error"><?php echo $lang['ship-rate8'] ?></div>
									</section>
									<section class="col col-4">
										<label class="input">
											<input type="text" name="typeweight" value="<?php echo $row_rates->typeweight;?>" placeholder="<?php echo $lang['ship-rate9'] ?>">
										</label>
										<div class="note note-error"><?php echo $lang['ship-rate9'] ?></div>
									</section>
								</div>
								
								
								<div class="row">
									<section class="col col-4">
										<label class="input">
											<input type="text" name="free_ship" value="<?php echo $row_rates->free_ship;?>" placeholder="<?php echo $lang['ship-rate10'] ?>">
										</label>
										<div class="note note-error"><?php echo $lang['ship-rate10'] ?></div>
									</section>
									<section class="col col-4">
										<label class="input">
											<input type="text" name="drop_off" value="<?php echo $row_rates->drop_off;?>" placeholder="<?php echo $lang['ship-rate11'] ?>">
										</label>
										<div class="note note-error"><?php echo $lang['ship-rate11'] ?></div>
									</section>
									<section class="col col-4">
										<label class="input">
											<input name="brand" type="file" class="fileinput"/>
										</label>
										<div class="note note-error"><?php echo $lang['ship-rate12'] ?></div>
									</section>
								</div>
								<footer>
									<button class="button" name="dosubmit" type="submit"><?php echo $lang['ship-rate13'] ?><span><i class="ti-reload"></i></span></button>
									<a href="tools.php?do=ship_rates" class="button button-secondary"><span><i class="ti-share-alt"></i></span> <?php echo $lang['ship-rate14'] ?></a> 
								</footer>
								<input name="id" type="hidden" value="<?php echo Filter::$id;?>" />
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- Column -->
		</div>
	</div>
</div>							
<?php echo Core::doForm("processShiprates");?> 

<?php break;?>
<?php case "add-ship_rates":?>
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="row">
			<!-- Column -->
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div id="loader" style="display:none"></div>
						<div id="msgholder"></div>
						<div class="responsive">
							<form class="xform" id="admin_form" method="post">
								<header><?php echo $lang['ship-rate15'] ?><span><?php echo $lang['ship-rate16'] ?></span></header>
								<div class="row">
									<section class="col col-4">
										<label class="input">
											<input type="text" name="n_courier" placeholder="<?php echo $lang['ship-rate18'] ?>">
										</label>
										<div class="note note-error"><?php echo $lang['ship-rate17'] ?></div>
									</section>
									<section class="col col-4">
										<label class="input">
											<input type="text" name="services" placeholder="<?php echo $lang['ship-rate19'] ?>">
										</label>
										<div class="note note-error"><?php echo $lang['ship-rate19'] ?></div>
									</section>
									<section class="col col-4">
										<label class="input">
											<input type="text" name="weight" placeholder="<?php echo $lang['ship-rate20'] ?>">
										</label>
										<div class="note note-error"><?php echo $lang['ship-rate20'] ?></div>
									</section>
								</div>
								<div class="row">
									<section class="col col-4">
										<label class="input">
											<input type="text" name="rate" placeholder="<?php echo $lang['ship-rate21'] ?>">
										</label>
										<div class="note note-error"><?php echo $lang['ship-rate21'] ?></div>
									</section>
									<section class="col col-4">
										<label class="input">
											<input type="text" name="deli_time" placeholder="<?php echo $lang['ship-rate22'] ?>">
										</label>
										<div class="note note-error"><?php echo $lang['ship-rate22'] ?></div>
									</section>
									<section class="col col-4">
										<label class="input">
											<input type="text" name="typeweight" placeholder="<?php echo $lang['ship-rate23'] ?>">
										</label>
										<div class="note note-error"><?php echo $lang['ship-rate23'] ?></div>
									</section>
								</div>
								
								
								<div class="row">
									<section class="col col-4">
										<label class="input">
											<input type="text" name="free_ship" placeholder="<?php echo $lang['ship-rate24'] ?>">
										</label>
										<div class="note note-error"><?php echo $lang['ship-rate24'] ?></div>
									</section>
									<section class="col col-4">
										<label class="input">
											<input type="text" name="drop_off" placeholder="<?php echo $lang['ship-rate25'] ?>">
										</label>
										<div class="note note-error"><?php echo $lang['ship-rate25'] ?></div>
									</section>
									<section class="col col-4">
										<label class="input">
											<input name="brand" type="file" class="fileinput"/>
										</label>
										<div class="note note-error"><?php echo $lang['ship-rate26'] ?></div>
									</section>
								</div>
								<footer>
									<button class="button" name="dosubmit" type="submit"><?php echo $lang['ship-rate27'] ?><span><i class="ti-briefcase"></i></span></button>
									<a href="tools.php?do=ship_rates" class="button button-secondary"><span><i class="ti-share-alt"></i></span> <?php echo $lang['ship-rate14'] ?></a> 
								</footer>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- Column -->
		</div>
	</div>
</div>
<?php echo Core::doForm("processShiprates");?> 

<?php break;?>
<?php default: ?>

<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="row">
		<?php $shipratesrow = $core->getShiprates();?>
			<div class="col-sm-12 col-md-12 col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="d-md-flex align-items-center">
							<div>
								<h3 class="card-title"><?php echo $lang['ship-rate28'] ?></h3>
							</div>
						</div>
						<!-- column -->
						<div id="loader" style="display:none"></div>
						<div id="msgholder"></div>
						<div class="table-responsive">
							<table id="zero_config" class="table table-bordered table-condensed table-hover table-striped">
								<thead>
									<tr>
										<th data-sort-initial="true" data-toggle="true"><b><?php echo $lang['ship-rate29'] ?></b></th>
										<th data-hide="Services"><b><?php echo $lang['ship-rate30'] ?></b></th>
										<th data-hide="Weight"><b><?php echo $lang['ship-rate31'] ?></b></th>
										<th data-hide="rate"><b><?php echo $lang['ship-rate41'] ?></b></th>
										<th data-hide="Delivery Time"><b><?php echo $lang['ship-rate32'] ?></b></th>
										<th data-hide="Type Weight"><b><?php echo $lang['ship-rate33'] ?></b></th>
										<th data-hide="Free Ship"><b><?php echo $lang['ship-rate34'] ?></b></th>
										<th data-hide="Drop Off"><b><?php echo $lang['ship-rate35'] ?></b></th>
										<th data-hide="Company Brand"><b><?php echo $lang['ship-rate36'] ?></b></th>
										<th data-sort-ignore="true" class="text-center"><b><?php echo $lang['ship-rate37'] ?></b></th>
									</tr>
								</thead>
								<div class="m-t-0">
									<div class="d-flex">
										<div class="mr-auto">
											<div class="form-group">
												<a href="tools.php?do=ship_rates&amp;action=add-ship_rates"><button id="demo-btn-addrow" class="btn btn-secondary btn-sm"><i class="ti-plus" aria-hidden="true"></i> <?php echo $lang['ship-rate38'] ?></button></a> 
											</div>
										</div>
									</div>
								</div>
								<tbody>
									<?php if(!$shipratesrow):?>
									<tr>
										<td colspan="9">
										<?php echo "
											<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_manage_shipment.png' width='130' /></i>
											",false;?>
										</td>
									</tr>
									<?php else:?>
									<?php foreach ($shipratesrow as $row):?>
									<tr>
										<td><?php echo $row->n_courier;?></td>
										<td><?php echo $row->services;?></td>
										<td><?php echo $row->weight;?></td>
										<td><?php echo $row->rate;?></td>
										<td><?php echo $row->deli_time;?></td>
										<td><?php echo $row->typeweight;?></td>
										<td><?php echo $row->free_ship;?></td>
										<td><?php echo $row->drop_off;?></td>
										<td><img src="../thumbmaker.php?src=<?php echo UPLOADURL;?><?php echo ($row->brand) ? $row->brand : "no_photo.png";?>&amp;w=80&amp;h=40&amp;s=1&amp;a=t1" alt="" title="" class="avatar" /></td>
										<td class="text-center">
											<a href="tools.php?do=ship_rates&amp;action=edit-ship_rates&amp;id=<?php echo $row->id;?>"><button type="button" class="btn btn-sm btn-icon btn-pure btn-outline" data-toggle="tooltip" data-original-title="<?php echo $lang['ship-rate39'] ?>"><i class="ti-pencil" aria-hidden="true"></i></button></a>
											<a id="item_<?php echo $row->id;?>" class="delete" data-rel="<?php echo $row->n_courier;?>"><button type="button" class="btn btn-sm btn-icon btn-pure btn-outline" data-toggle="tooltip" data-original-title="<?php echo $lang['ship-rate40'] ?>"><i class="ti-close" aria-hidden="true"></i></button></a>
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
<?php echo Core::doDelete("Delete Ship Rates","deleteShiprates");?> 
<?php break;?>
<?php endswitch;?>