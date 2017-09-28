<?php
	require_once("adminAuth.php");
	require_once("../mysql_link.ini.php");
	$register = $_POST["register"];
	$query = "UPDATE`t_system` SET `register` = '$register' WHERE `id` = '1'";
	if(mysqli_query($mysql_link,$query)){
		if($register == 1){
			echo "開啟";
		}else
			echo "關閉";
	}
	else
		echo "failure";   
?>