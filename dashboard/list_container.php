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


<?php $linerow = $core->getContainerline();?>

<div class="row">
	<!-- Column -->
	<div class="col-lg-12 col-xl-12 col-md-12">
		<div class="card">
			<div class="card-body">
				
				<div class="table-responsive">
					
					<table id="zero_config" class="table table-bordered table-condensed table-hover table-striped">
						<thead>
							<tr>
								<th><b><?php echo $lang['conlist-title2'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['conlist-title3'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['conlist-title4'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['conlist-title5'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['conlist-title6'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['conlist-title7'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['conlist-title8'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['conlist-title9'] ?></b></th>
							</tr>
						</thead>
						<div class="m-t-40">
							<div class="d-flex">
								<div class="mr-auto">
									<div class="form-group">
										<a href="client_container.php"><button type="button" class="btn btn-primary btn"><i class="ti-plus" aria-hidden="true"></i> <?php echo $lang['conlist-title1'] ?></button></a>
									</div>
								</div>
							</div>
						</div>
						<tbody>
							<?php if(!$linerow):?>
							<tr>
								<td colspan="8">
								<?php echo "
								<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_shipment.png' width='130' /></i>								
								",false;?>
								</td>
							</tr>
							<?php else:?>
							<?php foreach ($linerow as $row):?>
							<tr>
								<td><a href="edit_container.php?do=edit_container&amp;action=edit&amp;id=<?php echo $row->id;?>" ><?php echo $row->order_inv;?></a></td>
								<td><?php echo $row->r_name;?></td>
								<td class="text-center"><?php echo $row->origin_port;?></td>
								<td class="text-center"><?php echo $row->destination_port;?></td>
								<td class="text-center"><?php echo $row->courier;?></td>
								<td class="text-center">
								<?php if ($row->payment_status == 0){ ?>
									<?php echo $lang['conlist-title13'] ?>
								<?php }else{ ?>
								<img src='assets/images/alert/paid.png' width='68' />
								<?php } ?>
								</td>
								<td class="text-center"><span style="background: <?php echo $row->color; ?>;"  class="label label-large" ><?php echo $row->status_courier;?></span></td>
								<td class="text-center">
									<a  href="invoice/container.php?do=container&amp;action=ship&amp;id=<?php echo $row->id;?>" target="_blank" ><button type="button" class="btn btn-sm btn-icon btn-pure btn-outline" data-toggle="tooltip" data-original-title="<?php echo $lang['conlist-title10'] ?>"><i style="color:#343a40" class="ti-printer"></i></button></a>
									<a href="edit_container.php?do=edit_container&amp;action=edit&amp;id=<?php echo $row->id;?>" ><button type="button" class="btn btn-sm btn-icon btn-pure btn-outline" data-toggle="tooltip" data-original-title="<?php echo $lang['conlist-title11'] ?>"><i class="ti-pencil" aria-hidden="true"></i></button></a>	
									<a  class="delete"  data-rel="<?php echo $row->username;?>"><button type="button" class="btn btn-sm btn-icon btn-pure btn-outline" data-toggle="tooltip" data-original-title="<?php echo $lang['conlist-title12'] ?>"><i class="ti-close" aria-hidden="true"></i></button></a>
								</td>
							</tr>
							<?php endforeach;?>
							<?php unset($row);?>
							<?php endif;?>
						</tbody>
					</table>
					<?php echo $pager->display_pages();?>
					<?php echo Core::doDelete("Delete Item Container","deleteListcontainer");?> 
				</div>
			</div>
		</div>
	</div>
	<!-- Column -->
</div>
