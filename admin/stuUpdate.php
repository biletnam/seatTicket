<?php
	require_once("adminAuth.php");
	require_once("../mysql_link.ini.php");
	$stuid = $_POST["row_id"];
	$update_col = $_POST["column"];
	$update_val = $_POST["value"];
	switch($update_col){
		case "0":
			$query = "UPDATE `t_student` SET `sid` = '$update_val' WHERE sid = '$stuid'";
			mysqli_query($mysql_link,$query);
			break;
		case "1":
			$query = "UPDATE `t_student` SET `classNo` = '$update_val' WHERE sid = '$stuid'";
			mysqli_query($mysql_link,$query);
			break;
		case "2":
			$query = "UPDATE `t_student` SET `seatNo` = '$update_val' WHERE sid = '$stuid'";
			mysqli_query($mysql_link,$query);
			break;
		case "3":
			$query = "UPDATE `t_student` SET `sname` = '$update_val' WHERE sid = '$stuid'";
			mysqli_query($mysql_link,$query);
			break;
		case "4":
			$query = "UPDATE `t_student` SET `uid` = '$update_val' WHERE sid = '$stuid'";
			mysqli_query($mysql_link,$query);
			break;
		case "5":
			$query = "UPDATE `t_student` SET `pname` = '$update_val' WHERE sid = '$stuid'";
			mysqli_query($mysql_link,$query);
			break;
		case "6":
			$query = "UPDATE `t_student` SET `phoneno` = '$update_val' WHERE sid = '$stuid'";
			mysqli_query($mysql_link,$query);
			break;
		case "7":
			$query = "UPDATE `t_student` SET `w1` = '$update_val' WHERE sid = '$stuid'";
			mysqli_query($mysql_link,$query);
			break;
		case "8":
			$query = "UPDATE `t_student` SET `w2` = '$update_val' WHERE sid = '$stuid'";
			mysqli_query($mysql_link,$query);
			break;
		case "9":
			$query = "UPDATE `t_student` SET `w3` = '$update_val' WHERE sid = '$stuid'";
			mysqli_query($mysql_link,$query);
			break;
		case "10":
			$query = "UPDATE `t_student` SET `w4` = '$update_val' WHERE sid = '$stuid'";
			mysqli_query($mysql_link,$query);
			break;
		case "11":
			$query = "UPDATE `t_student` SET `w5` = '$update_val' WHERE sid = '$stuid'";
			mysqli_query($mysql_link,$query);
			break;
		case "13":
			$query = "UPDATE `t_student` SET `dinner` = '$update_val' WHERE sid = '$stuid'";
			mysqli_query($mysql_link,$query);
			break;
	}
	echo $update_val;
	if($update_col==12){
		$update_val = strtoupper($update_val);
		$query = "UPDATE `t_student` SET `libSeatNo` = '$update_val' WHERE sid = '$stuid'";
		if(!mysqli_query($mysql_link,$query)){
			echo "位置衝突重新輸入";
		}	
	}	
?>