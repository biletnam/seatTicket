<?php
	require_once("adminAuth.php");
	require_once("../mysql_link.ini.php");
	$startDate =  $_POST["startDate"];
	$endDate =  $_POST["endDate"];
	$days = (strtotime($endDate) - strtotime($startDate))/86400+1;
	for($i=0;$i<$days;$i++){
		$nextDate = date("Y-m-d",strtotime($startDate."+".$i." day"));
		$nextWeek = date("w",strtotime($startDate."+".$i." day"));
		$query = "insert into `t_shifts`(shiftDate,week) values('$nextDate','$nextWeek')";
		mysqli_query($mysql_link,$query);
	}
	echo $startDate." ~ ".$endDate." 建立日期表完成";
?>