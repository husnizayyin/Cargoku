function shipmentrejectedPDF(){
	var from = $('#bd-from').val();
	var until = $('#bd-until').val();
	window.open('report_all/shipment_rejected.php?from='+from+'&until='+until);
}