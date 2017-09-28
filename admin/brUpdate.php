<?php
	require_once("adminAuth.php");
	require_once("../mysql_link.ini.php");
	$breakRuleid = $_POST["row_id"];
	$update_col = $_POST["column"];
	$update_val = $_POST["value"];
	switch($update_col){
		case "1":
			$query = "UPDATE `t_breakrule` SET `date` = '$update_val' WHERE id = '$breakRuleid'";
			mysqli_query($mysql_link,$query);
			break;
		case "2":
			$query = "UPDATE `t_breakrule` SET `sid` = '$update_val' WHERE id = '$breakRuleid'";
			mysqli_query($mysql_link,$query);
			break;
		case "3":
			$query = "UPDATE `t_breakrule` SET `classNo` = '$update_val' WHERE id = '$breakRuleid'";
			mysqli_query($mysql_link,$query);
			break;
		case "4":
			$query = "UPDATE `t_breakrule` SET `seatNo` = '$update_val' WHERE id = '$breakRuleid'";
			mysqli_query($mysql_link,$query);
			break;
		case "5":
			$query = "UPDATE `t_breakrule` SET `sname` = '$update_val' WHERE id = '$breakRuleid'";
			mysqli_query($mysql_link,$query);
			break;
		case "6":
			$query = "UPDATE `t_breakrule` SET `reason` = '$update_val' WHERE id = '$breakRuleid'";
			mysqli_query($mysql_link,$query);
			break;
		case "7":
			$query = "UPDATE `t_breakrule` SET `point` = '$update_val' WHERE id = '$breakRuleid'";
			mysqli_query($mysql_link,$query);
			break;
	}
	$query = "select `sid` from `t_breakrule` where id = '$breakRuleid'";
	$sid = mysqli_fetch_array(mysqli_query($mysql_link,$query))[0];
	$query = "select sum(point) from `t_breakrule` where sid='$sid' group by sid";
	$total = mysqli_fetch_array(mysqli_query($mysql_link,$query))[0];
	$query = "UPDATE `t_breakrule` SET `total` = '$total' WHERE sid = '$sid'";
	mysqli_query($mysql_link,$query);
	echo $update_val;
?>