<?php
	require_once("adminAuth.php");
	require_once("../mysql_link.ini.php");
	$data_ids = $_POST['data_ids'];
	$data_id_array = explode(",", $data_ids);
	if(!empty($data_id_array)) {
	    foreach($data_id_array as $id) {
	        $del_date_query ="DELETE FROM `t_shifts` WHERE shiftDate = '$id'";
	        mysqli_query($mysql_link, $del_date_query);
	    }
	}
?>