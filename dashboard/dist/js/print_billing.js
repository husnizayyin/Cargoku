function billingsPDF(){
	var from = $('#bd-from').val();
	var until = $('#bd-until').val();
	window.open('report_all/billing.php?from='+from+'&until='+until);
}