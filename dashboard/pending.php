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
  
    $fechai=date('Y-m-d');
	$fechaf=date('Y-m-d');
  	
?>

<?php include 'head_user.php'; ?>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

<?php $allshiprow = $core->getPendingship();?>

<div class="row">
	<!-- Column -->
	<div class="col-lg-12 col-xl-12 col-md-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="example">
							<h4 class="card-title m-t-30"><?php echo $lang['langs_01035'] ?></h4>
							<form id="dForm" method="post" style="padding:0;">
								<div class="input-daterange input-group" id="date-range">
									<input class="form-control" id="bd-from"  placeholder="From Date" width="276" /> 
									&nbsp;
										<span class="input-group-text bg-info b-0 text-white"><?php echo $lang['langs_01036'] ?></span>
									&nbsp;
									<input class="form-control" id="bd-until"  placeholder="To Date" width="276" />
									&nbsp;&nbsp;
									<div class="input-group-append">
										<a target="_blank" href="javascript:shipmentpendingPDF();"><img src="assets/images/pdf.png" alt="x" border="0" height="43" width="38" /></a>
									</div>
								</div>
							</form>	
						</div>
					</div>					
				</div>
				<div class="table-responsive">
					<table id="zero_config" class="table table-bordered table-condensed table-hover table-striped">
						<thead>
							<tr>
								<th><b><?php echo $lang['ship-all1'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['ship-all2'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['ship-all3'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['ship-all4'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['ship-all5'] ?></b></th>
							</tr>
						</thead>
						
						<tbody>
							<?php if(!$allshiprow):?>
							<tr>
								<td colspan="7">
								<?php echo "
									<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_manage_shipment.png' width='130' /></i>
									",false;?>
								</td>
							</tr>
							<?php else:?>
							<?php foreach ($allshiprow as $row):?>
							<tr>
								<td><?php echo $row->order_inv;?></td>
								<td><?php echo $row->s_name;?></td>
								<td class="text-center"><?php echo $row->email;?></td>
								<td class="text-center"><span style="background: <?php echo $row->color; ?>;"  class="label label-large" ><?php echo $row->status_courier;?></span></td>
								<td class="text-center"><?php echo $row->r_costtotal;?></td>
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
<script>  
      $(document).ready(function(){  
           $.datepicker.setDefaults({  
                dateFormat: 'yy-mm-dd'   
           });  
           $(function(){  
                $("#bd-from").datepicker();  
                $("#bd-until").datepicker();  
           });    
      });  
 </script>
<script src="dist/js/print_shipmentpending.js"></script>