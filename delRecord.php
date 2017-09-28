<?php
	require_once("mysql_link.ini.php");
	$sid = $_POST["sid"];
	$uid = $_POST["uid"];
	$selectquery = "select * from `t_student` where sid='".$sid."' and uid='".$uid ."'";
	$result = @mysqli_query($mysql_link,$selectquery);
	if(@mysqli_num_rows($result)==1){
		$delquery = "delete from `t_student` where sid='".$sid."'";
		@mysqli_query($mysql_link,$delquery);
		echo "success";
	}else{
		echo "error";
	}
?>