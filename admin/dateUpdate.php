<?php
	require_once("adminAuth.php");
	require_once("../mysql_link.ini.php");
	$dateid = $_POST["row_id"];
	$update_col = $_POST["column"];
	$update_val = $_POST["value"];
	switch($update_col){
		case "0":
			$query = "UPDATE `t_shifts` SET `shiftDate` = '$update_val' WHERE shiftDate = '$dateid'";
			mysqli_query($mysql_link,$query);
			break;
		case "1":
			$query = "UPDATE `t_shifts` SET `week` = '$update_val' WHERE shiftDate = '$dateid'";
			mysqli_query($mysql_link,$query);
			break;
		case "2":
			$query = "UPDATE `t_shifts` SET `name1` = '$update_val' WHERE shiftDate = '$dateid'";
			mysqli_query($mysql_link,$query);
			break;
		case "3":
			$query = "UPDATE `t_shifts` SET `name2` = '$update_val' WHERE shiftDate = '$dateid'";
			mysqli_query($mysql_link,$query);
			break;
		case "4":
			$query = "UPDATE `t_shifts` SET `name3` = '$update_val' WHERE shiftDate = '$dateid'";
			mysqli_query($mysql_link,$query);
			break;
		case "5":
			$query = "UPDATE `t_shifts` SET `event` = '$update_val' WHERE shiftDate = '$dateid'";
			mysqli_query($mysql_link,$query);
			break;
		case "6":
			$query = "UPDATE `t_shifts` SET `memo` = '$update_val' WHERE shiftDate = '$dateid'";
			mysqli_query($mysql_link,$query);
			break;
	}
	echo $update_val;
?>