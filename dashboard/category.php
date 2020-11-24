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
  
	$itemrow = $core->getItem();
?>

<?php include 'head_user.php'; ?>


<!-- Styles and Status -->
<?php switch(Filter::$action): case "edit-category": ?>
<?php $row_item = Core::getRowById(Core::ciTable, Filter::$id);?>
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="row">
			<!-- Column -->
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<form class="xform" id="admin_form" method="post">
							<header><?php echo $lang['tools-category1'] ?><span><?php echo $lang['tools-category2'] ?> <i class="icon-double-angle-right"></i> <?php echo $row_item->name_item;?></span></header>
							<div class="row">
								<section class="col col-6">
									<label class="input">
										<input type="text" name="name_item" value="<?php echo $row_item->name_item;?>" placeholder="<?php echo $lang['tools-category1'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-category1'] ?></div>
								</section>
								<section class="col col-6">
									<label class="input">
										<textarea class="form-control" rows="2" type="text" name="detail_item" value="" placeholder="<?php echo $lang['tools-category3'] ?>"><?php echo $row_item->detail_item;?></textarea>
									</label>
									<div class="note note-error"><?php echo $lang['tools-category3'] ?></div>
								</section>
							</div>
							<footer>
								<button class="button" name="dosubmit" type="submit"><?php echo $lang['tools-category4'] ?><span><i class="ti-reload"></i></span></button>
								<a href="tools.php?do=category" class="button button-secondary"><span><i class="ti-share-alt"></i></span> <?php echo $lang['tools-category5'] ?></a> 
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
<?php echo Core::doForm("processItem");?> 

<?php break;?>
<?php case "add-category":?>
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
							<header><?php echo $lang['tools-category6'] ?><span><?php echo $lang['tools-category7'] ?></span></header>
							<div class="row">
								<section class="col col-6">
									<label class="input">
										<input type="text" name="name_item" placeholder="<?php echo $lang['tools-category6'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-category6'] ?></div>
								</section>
								<section class="col col-6">
									<label class="input">
										<textarea class="form-control" rows="2" name="detail_item" placeholder="<?php echo $lang['tools-category8'] ?>"></textarea>
									</label>
									<div class="note note-error"><?php echo $lang['tools-category8'] ?></div>
								</section>
							</div>
							<footer>
								<button class="button" name="dosubmit" type="submit"><?php echo $lang['tools-category9'] ?><span><i class="ti-briefcase"></i></span></button>
								<a href="tools.php?do=category" class="button button-secondary"><span><i class="ti-share-alt"></i></span> <?php echo $lang['tools-category5'] ?></a> 
							</footer>
						</form>
					</div>
				</div>
			</div>
			<!-- Column -->
		</div>
	</div>
</div>
<?php echo Core::doForm("processItem");?> 

<?php break;?>
<?php default: ?>

<div class="row justify-content-center">
	<div class="col-lg-8">
		<div class="row">			
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="d-md-flex align-items-center">
							<div>
								<h3 class="card-title"><?php echo $lang['tools-category10'] ?></h3>
							</div>
						</div>
						<!-- column -->
						<div id="loader" style="display:none"></div>
						<div id="msgholder"></div>
						<div class="table-responsive">
							<table id="zero_config" class="table table-bordered table-condensed table-hover table-striped">
								<thead>
									<tr>
										<th data-sort-initial="true" data-toggle="true"><b><?php echo $lang['tools-category11'] ?></b></th>
										<th data-hide="Deatils Category Item"><b><?php echo $lang['tools-category12'] ?></b></th>
										<th data-sort-ignore="true" class="text-center"><b><?php echo $lang['tools-category13'] ?></b></th>
									</tr>
								</thead>
								<div class="m-t-0">
									<div class="d-flex">
										<div class="mr-auto">
											<div class="form-group">
												<a href="tools.php?do=category&amp;action=add-category"><button id="demo-btn-addrow" class="btn btn-secondary btn-sm"><i class="ti-plus" aria-hidden="true"></i> <?php echo $lang['tools-category14'] ?></button></a> 
											</div>
										</div>
									</div>
								</div>
								<tbody>
									<?php if(!$itemrow):?>
									<tr>
										<td colspan="3">
										<?php echo "
										<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_shipment.png' width='130' /></i>								
										",false;?>
										</td>
									</tr>
									<?php else:?>
									<?php foreach ($itemrow as $row):?>
									<tr>
										<td><?php echo $row->name_item;?></td>
										<td><?php echo $row->detail_item;?></td>
										<td class="text-center">
											<a href="tools.php?do=category&amp;action=edit-category&amp;id=<?php echo $row->id;?>"><button type="button" class="btn btn-sm btn-icon btn-pure btn-outline" data-toggle="tooltip" data-original-title="<?php echo $lang['tools-category15'] ?>"><i class="ti-pencil" aria-hidden="true"></i></button></a>
											
											<a id="item_<?php echo $row->id;?>" class="delete" data-rel="<?php echo $row->name_item;?>"><button type="button" class="btn btn-sm btn-icon btn-pure btn-outline" data-toggle="tooltip" data-original-title="<?php echo $lang['tools-category16'] ?>"><i class="ti-close" aria-hidden="true"></i></button></a>
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
<?php echo Core::doDelete("Delete Category Item","deleteItem");?> 
<?php break;?>
<?php endswitch;?>