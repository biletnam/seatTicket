<?php
	require_once("adminAuth.php");
	require_once("../mysql_link.ini.php");
	$cancel = $_POST["cancel"];
	$query = "UPDATE`t_system` SET `cancel` = '$cancel' WHERE `id` = '1'";
	if(mysqli_query($mysql_link,$query)){
		if($cancel == 1){
			echo "開啟";
		}else
			echo "關閉";
	}
	else
		echo "failure";   
?>