<?php

	// *************************************************************************
	// *                                                                       *
	// * DEPRIXA -  Integrated Web System		                               *
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
	$color= '#f5f5f5';
	$colorhead= '#555';

	if(strlen($_GET['from'])>0 and strlen($_GET['until'])>0){
		$from = $_GET['from'];
		$until = $_GET['until'];

		$verDesde = date('d/m/Y', strtotime($from));
		$verHasta = date('d/m/Y', strtotime($until));
	}else{
		$from = '1111-01-01';
		$until = '9999-12-30';

		$verDesde = '__/__/____';
		$verHasta = '__/__/____';
		
	}

	$usuario = 'SELECT * FROM add_courier WHERE created  BETWEEN "'.$from.'" AND "'.$until.' AND act_status=1" ';	
	$add_courier=$db->query($usuario);
	

	require_once('../tcpdf/tcpdf.php');
	
	$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
	
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('Deprixa Pro');
	
	$pdf->setPrintHeader(false); 
	$pdf->setPrintFooter(false);
	$pdf->SetMargins(20, 20, 20, false); 
	$pdf->SetAutoPageBreak(true, 20); 
	$pdf->SetFont('Helvetica', '', 10);
	$pdf->addPage();

	$content = '';
	
	$content .= '
		<div class="row">
        	<div class="col-md-12">
				<!-- Logo text -->
				<span class="logo-text">
					 <!-- dark Logo text -->
					<img src="../../uploads/logo.png" width="120" height="26">
				</span>
            	<h2 style="text-align:left;">'.$lang['report-allship1'].'</h2>
       	
				  <table border="1" cellpadding="5">
					<thead>
					  <tr bgcolor="'.$colorhead.'">
						<th style="color:white;"><b>'.$lang['report-allship2'].'</b></th>
						<th style="color:white;"><b>'.$lang['report-allship3'].'</b></th>
						<th style="color:white;"><b>'.$lang['report-allship4'].'</b></th>
						<th style="color:white;"><b>'.$lang['report-allship5'].'</b></th>
					  </tr>
					</thead>
				';
				
				
				while ($user=$add_courier->fetch_assoc()) { 

				$content .= '
					<tr bgcolor="'.$color.'">
						<td>'.$user['order_inv'].'</td>
						<td>'.$user['s_name'].'</td>
						<td>'.$user['status_courier'].'</td>
						<td>'.$core->currency.' '.$user['r_costtotal'].'</td>
					</tr>
				';
				}
				
				$content .= '</table>';
				$content .= '</br></br>';
				$content .= '
					<div class="row padding">
						<div class="col-md-12" style="text-align:center;">
							  '.date('Y').' '.$core->site_name.' -  '.$lang['foot'].'
						</div>
					</div>
			 
				';
				
				$pdf->writeHTML($content, true, 0, true, 0);

				$pdf->lastPage();
				$pdf->output('shipment_all.pdf', 'I');


?>