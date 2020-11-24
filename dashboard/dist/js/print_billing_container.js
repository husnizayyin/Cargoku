function billingscontaPDF(){
	var orig = $('#bd-orig').val();
	var dest = $('#bd-dest').val();
	window.open('report_all/billing_container.php?orig='+orig+'&dest='+dest);
}