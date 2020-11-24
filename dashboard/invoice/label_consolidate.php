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

define("_VALID_PHP", true);
require_once("../../init.php");

if (!$user->is_Admin())
  redirect_to("../login.php");


switch(Filter::$action): case "label": 
$row = Core::getRowById(Core::consolTable, Filter::$id);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Favicon icon -->
<link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
	
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <title>Tracking - <?php echo $row->order_inv; ?></title>
<style>

#page-wrap { width: 800px; margin: 0 auto; }

hr {
  height: 1px;
  background-color: black;
}

.delete-wpr { position: relative; }
	.delete { display: block; color: #000; text-decoration: none; position: absolute; background: #EEEEEE; font-weight: bold; padding: 0px 3px; border: 1px solid; top: -6px; left: -22px; font-family: Verdana; font-size: 12px; }

	/* Extra CSS for Print Button*/
	.button {
		display: -webkit-box;
		display: -webkit-flex;
		display: -ms-flexbox;
		display: flex;
		overflow: hidden;
		margin-top: 20px;
		padding: 12px 12px;
		cursor: pointer;
		-webkit-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
		-webkit-transition: all 60ms ease-in-out;
		transition: all 60ms ease-in-out;
		text-align: center;
		white-space: nowrap;
		text-decoration: none !important;

		color: #fff;
		border: 0 none;
		border-radius: 4px;
		font-size: 14px;
		font-weight: 500;
		line-height: 1.3;
		-webkit-appearance: none;
		-moz-appearance: none;

		-webkit-box-pack: center;
		-webkit-justify-content: center;
		-ms-flex-pack: center;
		justify-content: center;
		-webkit-box-align: center;
		-webkit-align-items: center;
		-ms-flex-align: center;
		align-items: center;
		-webkit-box-flex: 0;
		-webkit-flex: 0 0 160px;
		-ms-flex: 0 0 160px;
		flex: 0 0 160px;
	}
	.button:hover {
		-webkit-transition: all 60ms ease;
		transition: all 60ms ease;
		opacity: .85;
	}
	.button:active {
		-webkit-transition: all 60ms ease;
		transition: all 60ms ease;
		opacity: .75;
	}
	.button:focus {
		outline: 1px dotted #959595;
		outline-offset: -4px;
	}

	.button.-regular {
		color: #202129;
		background-color: #edeeee;
	}
	.button.-regular:hover {
		color: #202129;
		background-color: #e1e2e2;
		opacity: 1;
	}
	.button.-regular:active {
		background-color: #d5d6d6;
		opacity: 1;
	}

	.button.-dark {
		color: #FFFFFF;
		background: #333030;
	}
	.button.-dark:focus {
		outline: 1px dotted white;
		outline-offset: -4px;
	}

	@media print
	{
		.no-print, .no-print *
		{
			display: none !important;
		}
	}
</style>
</head>

<body>
	<div id="page-wrap">
		<table class="table" style=" margin-left: auto; margin-right: auto; font-family:Arial, Helvetica, sans-serif;" border="0" width="100%" >
			<tbody>
				<tr>
					<td>						
						<table style="text-align: center; table-layout:fixed;"   cellspacing="2" width="100%">
							<tbody>
								<tr>
									<td width="75%">
										<p style="text-align: left;"><font size=6 face="arial"><strong><?php echo $row->service_options; ?></strong></font></p>										
									</td>
									<td width="25%">
										<p style="text-align: center;"><?php echo "<img src='".$core->site_url."/uploads/logo.png' border='0' width='190' height='39'>";  ?></p>							
									</td>
								</tr>
							</tbody>
						</table>
						<hr />
						<table  width="100%" style="text-align: center; table-layout:fixed;">
							<tbody>
								<tr bgcolor="#6c757d">
									<td width="50%">
										<p style="text-align: center;"><strong><font color="white" size="5"><?php echo $lang['inv-label1'] ?></font></strong></p>										
									</td>
									<td width="50%">
										<p style="text-align: center;"><font size="5" face="arial" color="white"><strong><?php echo $lang['inv-label2'] ?></strong></font></p>										
									</td>
								</tr>
								<tr>
									<font size=4><td align="center"  style=" border-top-color:#000000; border-right-color:#333; border-right-width:2px;border-right-style:solid;  border-collapse: collapse;">									 
										<p style="text-align: left;"><font size="4"><b><?php echo $core->site_name; ?></b></font></p>
										<p style="text-align: left; "><?php echo $core->c_phone; ?></p>
										<p style="text-align: left; "><strong><?php echo $core->site_email; ?> </strong></p>
										<p style="text-align: left;"><font size=5><strong><?php echo $core->c_address; ?> - <?php echo $core->c_country; ?>-<?php echo $core->c_city; ?></strong></font></p>
									</td>
									<td>
										<p style="text-align: left;"><font size="4"><b>&nbsp;&nbsp;&nbsp;<?php echo $row->r_name; ?></b></font></p>
										<p style="text-align: left;">&nbsp;&nbsp;&nbsp;<?php echo $row->r_phone; ?></p>
										<p style="text-align: left; "><strong>&nbsp;&nbsp;&nbsp;<?php echo $row->c_address; ?> </strong></p>
										<p style="text-align: left;"><font size=5><strong>&nbsp;&nbsp;<?php echo $row->r_dest; ?></strong></font></p>
									</td></font>
								</tr>
							</tbody>
						</table>
						<hr />
						<table style="text-align: center;" width="100%">
							<tbody>
								<tr>
									<td width="50%">
										<p><strong><?php echo $lang['inv-label4'] ?></strong></p>
										<p><font size=4><b><?php echo $row->deli_time; ?></b></font></p>
									</td>
									<td width="50%">
										<p><strong><?php echo $lang['inv-label5'] ?></strong></p>
										<p><font size=4><strong><b><?php echo $row->courier; ?></b></strong></p>
									</td>
								</tr>
						  </tbody>
					  </table>
					  <hr />
					  <table style="text-align: center;" width="100%">
							<tbody>
								<tr>
									<td width="50%">
										<p><strong><?php echo $lang['inv-label6'] ?></strong></p>
									</td>
									<td width="50%">
										<p><strong><?php echo $lang['inv-label7'] ?></strong></p>
									</td>
								</tr>
								<tr>
									<td width="50%">
										<p><font size=4><?php echo $row->r_qnty; ?> | <?php echo $row->r_weight; ?></font></p>
									</td>
									<td width="50%">
										<p><font size=4><?php echo $row->comments; ?></font></p>
									</td>
								</tr>
						  </tbody>
					  </table>
					  <hr />
					  <center  width="100%">
						<div class="output">
						  <p style='padding:5px; text-align:center; font-size:24px; font-family:Arial,Helvetica;'><?php echo $lang['inv-label8'] ?></p>
						  <section class="output">
						  <img src='https://barcode.tec-it.com/barcode.ashx?data=<?php echo $row->order_inv; ?>&code=Code39&multiplebarcodes=false&translate-esc=false&unit=Fit&dpi=150&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&qunit=Mm&quiet=0&modulewidth=50' alt='<?php echo $row->order_inv; ?>'/></section>
						</div>
					  </center>
					  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src='https://barcode.tec-it.com/barcode.ashx?data=<?php echo $row->order_inv; ?>&code=QRCode&multiplebarcodes=false&translate-esc=false&unit=Fit&dpi=120&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&qunit=Mm&quiet=0&modulewidth=120&eclevel=L' alt='<?php echo $row->order_inv; ?>'/>
					</td>
				</tr>
			</tbody>
		</table>
		<button class='button -dark center no-print'  onClick="window.print();" style="font-size:16px"><?php echo $lang['inv-label9'] ?>&nbsp;&nbsp; <li class="fa fa-print"></i></button>
	</div>
</body>
</html>

<?php 
break;
endswitch;
?>