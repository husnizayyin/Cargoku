<?php
	define("_VALID_PHP", true);
	require_once("../../../init.php");

    $data = json_decode(file_get_contents("php://input"));

    $count = count($data);

    $out = array('error' => false);

    foreach($data as $key => $value){
        $order_inv = $value->order_inv;
        $s_name = $value->s_name;
        $r_qnty = $value->r_qnty;
		$r_weight = $value->r_weight;
		$v_weight = $value->v_weight;
		$r_description = $value->r_description;
		$r_costtotal = $value->r_costtotal;

        $sql = "INSERT INTO add_consolidate (order_inv, s_name, r_qnty, r_weight, v_weight, r_description, r_costtotal, created, r_hour) VALUES ('$order_inv', '$s_name', '$r_qnty', '$r_weight', '$v_weight', '$r_description', '$r_costtotal', NOW(), NOW())";
        $query = $db->query($sql);
    }

    if($query){
        $out['message'] = "($count) Consolidated added successfully";
    }
    else{
        $out['error'] = true;
        $out['message'] = "Cannot add Consolidated";
    }
  
    echo json_encode($out);
?>