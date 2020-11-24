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


<?php $courierrow = $core->getConsolidate_list(); ?>

<div class="row">
	<!-- Column -->
	<div class="col-lg-12 col-xl-12 col-md-12">
		<div class="card">
			<div class="card-body">
				
				<div class="table-responsive">
					
					<table id="zero_config" class="table table-bordered table-condensed table-hover table-striped">
						<thead>
							<tr>
								<th><b><?php echo $lang['langs_01014'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['langs_01015'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['langs_01016'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['langs_01017'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['langs_01018'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['langs_01019'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['langs_01020'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['langs_01021'] ?></b></th>
							</tr>
						</thead>
						<div class="m-t-40">
							<div class="d-flex">
								<div class="mr-auto">
									<div class="form-group">
										<a href="add_packages.php"><button type="button" class="btn btn-primary btn"><i class="ti-plus" aria-hidden="true"></i> <?php echo $lang['langs_01022'] ?></button></a>
									</div>
								</div>
							</div>
						</div>
						<tbody>
							<?php if(!$courierrow):?>
							<tr>
								<td colspan="8">
								<?php echo "
								<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_shipment.png' width='140' /></i>
								",false;?>
								</td>
							</tr>
							<?php else: ?>
							<?php foreach ($courierrow as $row):?>
							<tr>
								<td><a  href="edit_consolidate.php?do=edit_consolidate&amp;action=ship&amp;id=<?php echo $row->id;?>"><?php echo $row->order_inv;?></a></td>
								<td><?php echo $row->order_cons;?></td>
								<td><?php echo $row->r_name;?></td>
								<td class="text-center"><?php echo $row->code_off;?></td>
								<td class="text-center"><?php echo $row->r_dest;?>-<?php echo $row->c_address;?></td>
								<td class="text-center"><?php echo $row->r_descriptions;?></td>
								<td class="text-center"><span style="background: <?php echo $row->color; ?>;"  class="label label-large" ><?php echo $row->status_courier;?></span></td>
								<td align='center'>
								<a  href="edit_consolidate.php?do=edit_consolidate&amp;action=ship&amp;id=<?php echo $row->id;?>" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['tooledit'] ?>"><i style="color:#343a40" class="ti-pencil"></i></a>
								<a  href="invoice/inv_consolidate.php?do=inv_consolidate&amp;action=ship&amp;id=<?php echo $row->id;?>" target="_blank" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['toolprint'] ?>"><i style="color:#343a40" class="ti-printer"></i></a>
								<a  href="invoice/label_consolidate.php?do=label_consolidate&amp;action=label&amp;id=<?php echo $row->id;?>" target="_blank" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['toollabel'] ?>"><i style="color:#343a40" class="ti-bookmark-alt"></i></a>
								<a  href="status_consolidate.php?do=status_consolidate&amp;action=status&amp;id=<?php echo $row->id;?>" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['toolupdate'] ?>"><i style="color:#20c997" class="ti-reload"></i></a> 

								<a  href="deliver_consolidate.php?do=deliver_consolidate&amp;action=status&amp;id=<?php echo $row->id;?>" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['tooldeliver'] ?>"><i style="color:#2962FF" class="ti-package"></i></a>
								<a  data-rel="<?php echo $row->r_name;?>" class="delete" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['tooldelete'] ?>"><i style="color:#343a40" class="ti-trash"></i></a>
								</td>
							</tr>
							<?php endforeach;?>
							<?php unset($row);?>
							<?php endif;?>
						</tbody>
					</table>
					<?php echo Core::doDelete("Delete Consolidated","deleteListconsolidate");?> 
				</div>
			</div>
		</div>
	</div>
	<!-- Column -->
</div>
