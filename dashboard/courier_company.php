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


<!-- List of Offices -->
<?php switch(Filter::$action): case "edit-courier_company": ?>
<?php $row_courier = Core::getRowById(Core::ccTable, Filter::$id);?>
<div class="row justify-content-center">
	<div class="col-lg-8">
		<div class="row">
			<!-- Column -->
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<form class="xform" id="admin_form" method="post">
							<header><?php echo $lang['tools-courier1'] ?><span><?php echo $lang['tools-courier2'] ?> <i class="icon-double-angle-right"></i> <?php echo $row_courier->name_com;?></span></header>
							<div class="row">
								<section class="col col-4">
									<label class="input">
										<input type="text" name="name_com" value="<?php echo $row_courier->name_com;?>" placeholder="<?php echo $lang['tools-courier3'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-courier3'] ?></div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="address_cou" value="<?php echo $row_courier->address_cou;?>" placeholder="<?php echo $lang['tools-courier4'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-courier4'] ?></div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="phone_cou" value="<?php echo $row_courier->phone_cou;?>" placeholder="<?php echo $lang['tools-courier5'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-courier5'] ?></div>
								</section>
							</div>
							<div class="row">
								<section class="col col-4">
									<label class="input">
										<input type="text" name="country_cou" value="<?php echo $row_courier->country_cou;?>" placeholder="<?php echo $lang['tools-courier6'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-courier6'] ?></div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="city_cou" value="<?php echo $row_courier->city_cou;?>" placeholder="<?php echo $lang['tools-courier7'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-courier7'] ?></div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="postal_cou" value="<?php echo $row_courier->postal_cou;?>" placeholder="<?php echo $lang['tools-courier8'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-courier8'] ?></div>
								</section>
							</div>
							<footer>
								<button class="button" name="dosubmit" type="submit"><?php echo $lang['tools-courier9'] ?><span><i class="ti-reload"></i></span></button>
								<a href="tools.php?do=courier_company" class="button button-secondary"><span><i class="ti-share-alt"></i></span> <?php echo $lang['tools-courier10'] ?></a> 
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
<?php echo Core::doForm("processCouriercom");?> 

<?php break;?>
<?php case "add-courier_company":?>
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
							<header><span><?php echo $lang['tools-courier11'] ?></span></header>
							<div class="row">
								<section class="col col-4">
									<label class="input">
										<input type="text" name="name_com" placeholder="<?php echo $lang['tools-courier12'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-courier12'] ?></div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="address_cou" placeholder="<?php echo $lang['tools-courier28'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-courier28'] ?></div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="phone_cou" placeholder="<?php echo $lang['tools-courier29'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-courier29'] ?></div>
								</section>
							</div>
							<div class="row">
								<section class="col col-4">
									<label class="input">
										<input type="text" name="country_cou" placeholder="<?php echo $lang['tools-courier13'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-courier13'] ?></div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="city_cou" placeholder="<?php echo $lang['tools-courier14'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-courier14'] ?></div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="postal_cou" placeholder="<?php echo $lang['tools-courier15'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-courier15'] ?></div>
								</section>
							</div>
							<footer>
								<button class="button" name="dosubmit" type="submit"><?php echo $lang['tools-courier16'] ?><span><i class="ti-briefcase"></i></span></button>
								<a href="tools.php?do=courier_company" class="button button-secondary"><span><i class="ti-share-alt"></i></span> <?php echo $lang['tools-courier10'] ?></a> 
							</footer>
						</form>
					</div>
				</div>
			</div>
			<!-- Column -->
		</div>
	</div>
</div>
<?php echo Core::doForm("processCouriercom");?> 

<?php break;?>
<?php default: ?>

<div class="row justify-content-center">
	<div class="col-lg-12">
		<div class="row">
		<?php $courierrow = $core->getCouriercom();?>
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="d-md-flex align-items-center">
							<div>
								<h3 class="card-title"><?php echo $lang['tools-courier17'] ?></h3>
							</div>
						</div>
						<!-- column -->
						<div id="loader" style="display:none"></div>
						<div id="msgholder"></div>
						<div class="table-responsive">
							<table id="zero_config" class="table table-bordered table-condensed table-hover table-striped">
								<thead>
									<tr>
										<th data-sort-initial="true" data-toggle="true"><b><?php echo $lang['tools-courier18'] ?></b></th>
										<th data-hide="Address"><b><?php echo $lang['tools-courier19'] ?></b></th>
										<th data-hide="Phone"><b><?php echo $lang['tools-courier20'] ?></b></th>
										<th data-hide="Country"><b><?php echo $lang['tools-courier21'] ?></b></th>
										<th data-hide="City"><b><?php echo $lang['tools-courier22'] ?></b></th>
										<th data-hide="Postal Code"><b><?php echo $lang['tools-courier23'] ?></b></th>
										<th data-sort-ignore="true" class="text-center"><b><?php echo $lang['tools-courier24'] ?></b></th>
									</tr>
								</thead>
								<div class="m-t-0">
									<div class="d-flex">
										<div class="mr-auto">
											<div class="form-group">
												<a href="tools.php?do=courier_company&amp;action=add-courier_company"><button id="demo-btn-addrow" class="btn btn-secondary btn-sm"><i class="ti-plus" aria-hidden="true"></i> <?php echo $lang['tools-courier25'] ?></button></a> 
											</div>
										</div>
									</div>
								</div>
								<tbody>
									<?php if(!$courierrow):?>
									<tr>
										<td colspan="5">
										<?php echo "
										<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_shipment.png' width='130' /></i>								
										",false;?>
										</td>
									</tr>
									<?php else:?>
									<?php foreach ($courierrow as $row):?>
									<tr>
										<td><?php echo $row->name_com;?></td>
										<td><?php echo $row->address_cou;?></td>
										<td><?php echo $row->phone_cou;?></td>
										<td><?php echo $row->country_cou;?></td>
										<td><?php echo $row->city_cou;?></td>
										<td><?php echo $row->postal_cou;?></td>
										<td class="text-center">
											<a href="tools.php?do=courier_company&amp;action=edit-courier_company&amp;id=<?php echo $row->id;?>"><button type="button" class="btn btn-sm btn-icon btn-pure btn-outline" data-toggle="tooltip" data-original-title="<?php echo $lang['tools-courier26'] ?>"><i class="ti-pencil" aria-hidden="true"></i></button></a>
											<a id="item_<?php echo $row->id;?>" class="delete" data-rel="<?php echo $row->name_off;?>"><button type="button" class="btn btn-sm btn-icon btn-pure btn-outline" data-toggle="tooltip" data-original-title="<?php echo $lang['tools-courier27'] ?>"><i class="ti-close" aria-hidden="true"></i></button></a>
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
<?php echo Core::doDelete("Delete Courier Company","deleteCouriercom");?> 
<?php break;?>
<?php endswitch;?>