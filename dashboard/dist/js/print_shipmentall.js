function shipmentallPDF(){
	var from = $('#bd-from').val();
	var until = $('#bd-until').val();
	window.open('report_all/shipment_all.php?from='+from+'&until='+until);
}