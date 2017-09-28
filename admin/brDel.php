<?php 
	require_once("adminAuth.php");
	require_once("../mysql_link.ini.php");
	$data_ids = $_POST['data_ids'];
	$data_id_array = explode(",", $data_ids);
	if(!empty($data_id_array)) {
	    foreach($data_id_array as $id) {
			$query = "select `sid` from `t_breakrule` where id = $id";
			$sid = mysqli_fetch_array(mysqli_query($mysql_link,$query))[0];
	        $query ="DELETE FROM `t_breakrule` WHERE id = $id";
	        mysqli_query($mysql_link, $query);
			$query = "select sum(point) from `t_breakrule` where sid=$sid group by sid";
			$total = mysqli_fetch_array(mysqli_query($mysql_link,$query))[0];
			$query = "UPDATE `t_breakrule` SET `total` = $total WHERE sid = $sid";
			mysqli_query($mysql_link,$query);

	    }
	}

?>