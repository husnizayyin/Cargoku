<?php
define("_VALID_PHP", true);
require_once("../../../init.php");	

	if(isset($_POST['save'])){
		if($_FILES['file']['name']){
			$filename = explode(".", $_FILES['file']['name']);
			if($filename[1] == 'csv'){
				$handler = fopen($_FILES['file']['tmp_name'], "r");
				while($emapData = fgetcsv($handler)){
					$sql = "INSERT into add_consolidate (`idcon`,`con_tmp`,`order_inv`, `s_name`, `r_qnty`, `r_weight`, `v_weight`, `r_description`, `r_costtotal`, `created`, `r_hour`, `act_status`) 
					values('$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]','$emapData[7]', '$emapData[8]', '$emapData[9]', NOW(), NOW(), '$emapData[12]')";
					
					$result=$db->query($sql);
					if(! $result )
					{
						echo "<script type=\"text/javascript\">
								alert(\"Invalid File:Please Upload CSV File.\");
								window.location = \"". SITEURL."/dashboard/add_packages.php\"
							</script>";
					
					}
				}
				
				fclose($handler);
				//throws a message if data successfully imported to mysql database from excel file
				 echo "<script type=\"text/javascript\">
							alert(\"CSV File has been successfully Imported.\");
							window.location = \"". SITEURL."/dashboard/add_packages.php\"
						</script>";
			}
		}
	}
?>		 