<?php

	define("_VALID_PHP", true);
	require_once("../../../init.php");
	
	
	$sql = json_decode(file_get_contents("php://input"));

    $count = count($sql);
	$out = array('error' => false);

	$sql = "DELETE FROM add_consolidate";
	$query=$db->query($sql);
	
	if($query){
        $out['messages'] = "($count) Record deleted successfully";
    }
    else{
        $out['error'] = true;
        $out['messages'] = "Error deleting record";
    }

	echo json_encode($out);
?>