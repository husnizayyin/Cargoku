function shipmentpendingPDF(){
	var from = $('#bd-from').val();
	var until = $('#bd-until').val();
	window.open('report_all/shipment_pending.php?from='+from+'&until='+until);
}