function shipmentdeliveredPDF(){
	var from = $('#bd-from').val();
	var until = $('#bd-until').val();
	window.open('report_all/shipment_delivered.php?from='+from+'&until='+until);
}