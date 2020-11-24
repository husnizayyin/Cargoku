<?php

	define("_VALID_PHP", true);
	require_once("../../../init.php");
	
	$output = array();
	$sql = "SELECT * FROM add_consolidate WHERE act_status=0";
	$query=$db->query($sql);
	while($row=$query->fetch_array()){
		$output[] = $row;
	}

	echo json_encode($output);
?>