function consolidatedeliveredPDF(){
	var from = $('#bd-from').val();
	var until = $('#bd-until').val();
	window.open('report_all/consolidated_delivered.php?from='+from+'&until='+until);
}